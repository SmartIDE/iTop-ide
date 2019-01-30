<?php
/**
 * Created by Bruno DA SILVA, working for Combodo
 * Date: 24/01/19
 * Time: 17:28
 */

namespace Combodo\iTop\Portal\Bricks;

use Combodo\iTop\Portal\Brick\PortalBrick;
use Combodo\iTop\Portal\Helper\ApplicationHelper;
use UserRights;

class BricksCollection
{
    /** @var array|null lazily computed */
    private $allowedBricksData;
    /**
     * @var \ModuleDesign
     */
    private $moduleDesign;

    public function __construct(\ModuleDesign $moduleDesign)
    {
        $this->moduleDesign = $moduleDesign;
    }

    public function __call($method, $arguments)
    {
        return $this->getBrickPorperty($method);
    }

    /**
     * @param $key
     *
     * @return mixed
     * @throws BricksCollectionPropertyNotFoundException
     */
    private function getBrickPorperty($key)
    {
        if (array_key_exists($key, $this->getBricks())) {
            return $this->getBricks()[$key];
        }

        throw new BricksCollectionPropertyNotFoundException(
            "The property '$key' do not exists in BricksCollection with keys: ".array_keys($this->getBricks())
        );
    }

    public function getBricks()
    {
        if (! isset($this->allowedBricksData)) {
            $this->lazyLoad();
        }

        return $this->allowedBricksData;
    }

    public function getBrickById($id)
    {
        foreach ($this->getBricks()['bricks'] as $brick) {
            if ($brick->GetId() === $id)
            {
                return $brick;
            }
        }

        throw new BricksCollectionBrickNotFoundException('Brick with id = "'.$id.'" was not found among loaded bricks.');
    }

    private function lazyLoad()
    {

        $rawBrickList = $this->getRawBrickList();

        $this->allowedBricksData = array(
            'bricks' => array(),
            'bricks_total_width' => 0,
            'bricks_home_count' => 0,
            'bricks_navigation_menu_count' => 0
        );

        foreach ($rawBrickList as $oBrick) {
            ApplicationHelper::LoadBrickSecurity($oBrick);

            if ($oBrick->GetActive() && $oBrick->IsGrantedForProfiles(UserRights::ListProfiles()))
            {
                $this->allowedBricksData['bricks'][] = $oBrick;
                $this->allowedBricksData['bricks_total_width'] += $oBrick->GetWidth();
                if ($oBrick->GetVisibleHome())
                {
                    $this->allowedBricksData['bricks_home_count']++;
                }
                if ($oBrick->GetVisibleNavigationMenu())
                {
                    $this->allowedBricksData['bricks_navigation_menu_count']++;
                }
            }
        }

        // - Sorting bricks by rank
        $this->allowedBricksData['bricks_ordering'] = array();
        //   - Home
        $this->allowedBricksData['bricks_ordering']['home'] = $this->allowedBricksData['bricks'];
        usort($this->allowedBricksData['bricks_ordering']['home'], function (PortalBrick $a, PortalBrick $b) {
            return $a->GetRankHome() > $b->GetRankHome();
        });
        //    - Navigation menu
        $this->allowedBricksData['bricks_ordering']['navigation_menu'] = $this->allowedBricksData['bricks'];
        usort($this->allowedBricksData['bricks_ordering']['navigation_menu'], function (PortalBrick $a, PortalBrick $b) {
            return $a->GetRankNavigationMenu() > $b->GetRankNavigationMenu();
        });
    }

    private function getRawBrickList()
    {
        ApplicationHelper::LoadBricks();



        foreach ($this->moduleDesign->GetNodes('/module_design/bricks/brick') as $oBrickNode)
        {
            $sBrickClass = $oBrickNode->getAttribute('xsi:type');
            try
            {
                if (class_exists($sBrickClass))
                {
                    /** @var \Combodo\iTop\Portal\Brick\PortalBrick $oBrick */
                    $oBrick = new $sBrickClass();
                    $oBrick->LoadFromXml($oBrickNode);

                    $aBricks[] = $oBrick;
                }
                else
                {
                    throw new DOMFormatException('Unknown brick class "'.$sBrickClass.'" from xsi:type attribute', null,
                        null, $oBrickNode);
                }
            }
            catch (DOMFormatException $e)
            {
                throw new Exception('Could not create brick ('.$sBrickClass.') from XML because of a DOM problem : '.$e->getMessage());
            }
            catch (Exception $e)
            {
                throw new Exception('Could not create brick ('.$sBrickClass.') from XML : '.$oBrickNode->Dump().' '.$e->getMessage());
            }
        }



        return $aBricks;
    }

}