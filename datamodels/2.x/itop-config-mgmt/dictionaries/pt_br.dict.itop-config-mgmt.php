<?php
// Copyright (C) 2010-2021 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2010-2021 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */
//////////////////////////////////////////////////////////////////////
// Relations
//////////////////////////////////////////////////////////////////////
//
Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Relation:impacts/Description' => 'Elementos impactados por',
	'Relation:impacts/DownStream' => 'Impacto...',
	'Relation:impacts/DownStream+' => 'Elementos impactados por',
	'Relation:impacts/UpStream' => 'Depende de...',
	'Relation:impacts/UpStream+' => 'Elementos estes, que dependem deste elemento',
	// Legacy entries
	'Relation:depends on/Description' => 'Elementos estes, que dependem deste elemento',
	'Relation:depends on/DownStream' => 'Depende de...',
	'Relation:depends on/UpStream' => 'Impactos...',
));


// Dictionnay conventions
// Class:<class_name>
// Class:<class_name>+
// Class:<class_name>/Attribute:<attribute_code>
// Class:<class_name>/Attribute:<attribute_code>+
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>+
// Class:<class_name>/Stimulus:<stimulus_code>
// Class:<class_name>/Stimulus:<stimulus_code>+
// Class:<class_name>/UniquenessRule:<rule_code>
// Class:<class_name>/UniquenessRule:<rule_code>+

//////////////////////////////////////////////////////////////////////
// Classes in 'bizmodel'
//////////////////////////////////////////////////////////////////////
//

// Dictionnay conventions
// Class:<class_name>
// Class:<class_name>+
// Class:<class_name>/Attribute:<attribute_code>
// Class:<class_name>/Attribute:<attribute_code>+
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>
// Class:<class_name>/Attribute:<attribute_code>/Value:<value>+
// Class:<class_name>/Stimulus:<stimulus_code>
// Class:<class_name>/Stimulus:<stimulus_code>+
// Class:<class_name>/UniquenessRule:<rule_code>
// Class:<class_name>/UniquenessRule:<rule_code>+

//////////////////////////////////////////////////////////////////////
// Note: The classes have been grouped by categories: bizmodel
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// Classes in 'bizmodel'
//////////////////////////////////////////////////////////////////////
//

//
// Class: lnkContactToFunctionalCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkContactToFunctionalCI' => 'Link Contato / CI',
	'Class:lnkContactToFunctionalCI+' => '',
	'Class:lnkContactToFunctionalCI/Attribute:functionalci_id' => 'CIs',
	'Class:lnkContactToFunctionalCI/Attribute:functionalci_id+' => '',
	'Class:lnkContactToFunctionalCI/Attribute:functionalci_name' => 'Nome CI',
	'Class:lnkContactToFunctionalCI/Attribute:functionalci_name+' => '',
	'Class:lnkContactToFunctionalCI/Attribute:contact_id' => 'Contato',
	'Class:lnkContactToFunctionalCI/Attribute:contact_id+' => '',
	'Class:lnkContactToFunctionalCI/Attribute:contact_name' => 'Nome contato',
	'Class:lnkContactToFunctionalCI/Attribute:contact_name+' => '',
));

//
// Class: FunctionalCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:FunctionalCI' => 'CI',
	'Class:FunctionalCI+' => '',
	'Class:FunctionalCI/Attribute:name' => 'Nome',
	'Class:FunctionalCI/Attribute:name+' => '',
	'Class:FunctionalCI/Attribute:description' => 'Descri????o',
	'Class:FunctionalCI/Attribute:description+' => '',
	'Class:FunctionalCI/Attribute:org_id' => 'Organiza????o',
	'Class:FunctionalCI/Attribute:org_id+' => '',
	'Class:FunctionalCI/Attribute:organization_name' => 'Nome organiza????o',
	'Class:FunctionalCI/Attribute:organization_name+' => 'Nome comum',
	'Class:FunctionalCI/Attribute:business_criticity' => 'Criticidade neg??cio',
	'Class:FunctionalCI/Attribute:business_criticity+' => '',
	'Class:FunctionalCI/Attribute:business_criticity/Value:high' => 'Alta',
	'Class:FunctionalCI/Attribute:business_criticity/Value:high+' => 'Alta',
	'Class:FunctionalCI/Attribute:business_criticity/Value:low' => 'Baixa',
	'Class:FunctionalCI/Attribute:business_criticity/Value:low+' => 'Baixa',
	'Class:FunctionalCI/Attribute:business_criticity/Value:medium' => 'M??dia',
	'Class:FunctionalCI/Attribute:business_criticity/Value:medium+' => 'M??dia',
	'Class:FunctionalCI/Attribute:move2production' => 'Data ir para produ????o',
	'Class:FunctionalCI/Attribute:move2production+' => '',
	'Class:FunctionalCI/Attribute:contacts_list' => 'Contatos',
	'Class:FunctionalCI/Attribute:contacts_list+' => 'Todos os contatos para esse item de configura????o',
	'Class:FunctionalCI/Attribute:documents_list' => 'Documentos',
	'Class:FunctionalCI/Attribute:documents_list+' => 'Todos os documentos vinculados a este item de configura????o',
	'Class:FunctionalCI/Attribute:applicationsolution_list' => 'Solu????es de aplica????es',
	'Class:FunctionalCI/Attribute:applicationsolution_list+' => 'Todas as solu????es de aplica????o, dependente desse item de configura????o',
	'Class:FunctionalCI/Attribute:softwares_list' => 'Softwares',
	'Class:FunctionalCI/Attribute:softwares_list+' => 'Todos os softwares instalados neste item de configura????o',
	'Class:FunctionalCI/Attribute:finalclass' => 'Tipo CI',
	'Class:FunctionalCI/Attribute:finalclass+' => '',
	'Class:FunctionalCI/Tab:OpenedTickets' => 'Ingressos Ativos',
));

//
// Class: PhysicalDevice
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PhysicalDevice' => 'Dispositivos f??sicos',
	'Class:PhysicalDevice+' => '',
	'Class:PhysicalDevice/Attribute:serialnumber' => 'N??mero serial',
	'Class:PhysicalDevice/Attribute:serialnumber+' => '',
	'Class:PhysicalDevice/Attribute:location_id' => 'Localidade',
	'Class:PhysicalDevice/Attribute:location_id+' => '',
	'Class:PhysicalDevice/Attribute:location_name' => 'Nome localidade',
	'Class:PhysicalDevice/Attribute:location_name+' => '',
	'Class:PhysicalDevice/Attribute:status' => 'Estado',
	'Class:PhysicalDevice/Attribute:status+' => '',
	'Class:PhysicalDevice/Attribute:status/Value:implementation' => 'Implementa????o',
	'Class:PhysicalDevice/Attribute:status/Value:implementation+' => 'Implementa????o',
	'Class:PhysicalDevice/Attribute:status/Value:obsolete' => 'Obsoleto',
	'Class:PhysicalDevice/Attribute:status/Value:obsolete+' => 'Obsoleto',
	'Class:PhysicalDevice/Attribute:status/Value:production' => 'Produ????o',
	'Class:PhysicalDevice/Attribute:status/Value:production+' => 'Produ????o',
	'Class:PhysicalDevice/Attribute:status/Value:stock' => 'Suporte',
	'Class:PhysicalDevice/Attribute:status/Value:stock+' => 'Suporte',
	'Class:PhysicalDevice/Attribute:brand_id' => 'Fabricante',
	'Class:PhysicalDevice/Attribute:brand_id+' => '',
	'Class:PhysicalDevice/Attribute:brand_name' => 'Nome fabricante',
	'Class:PhysicalDevice/Attribute:brand_name+' => '',
	'Class:PhysicalDevice/Attribute:model_id' => 'Modelo',
	'Class:PhysicalDevice/Attribute:model_id+' => '',
	'Class:PhysicalDevice/Attribute:model_name' => 'Nome modelo',
	'Class:PhysicalDevice/Attribute:model_name+' => '',
	'Class:PhysicalDevice/Attribute:asset_number' => 'N??mero do ativo',
	'Class:PhysicalDevice/Attribute:asset_number+' => '',
	'Class:PhysicalDevice/Attribute:purchase_date' => 'Data da compra',
	'Class:PhysicalDevice/Attribute:purchase_date+' => '',
	'Class:PhysicalDevice/Attribute:end_of_warranty' => 'Fim da garantia',
	'Class:PhysicalDevice/Attribute:end_of_warranty+' => '',
));

//
// Class: Rack
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Rack' => 'Rack',
	'Class:Rack+' => '',
	'Class:Rack/Attribute:nb_u' => 'Unidades',
	'Class:Rack/Attribute:nb_u+' => '',
	'Class:Rack/Attribute:device_list' => 'Dispositivos',
	'Class:Rack/Attribute:device_list+' => 'Todos os dispositivos f??sicos empilhados neste rack',
	'Class:Rack/Attribute:enclosure_list' => 'Gavetas',
	'Class:Rack/Attribute:enclosure_list+' => 'Todas as gavetas neste rack',
));

//
// Class: TelephonyCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:TelephonyCI' => 'Telefonia',
	'Class:TelephonyCI+' => '',
	'Class:TelephonyCI/Attribute:phonenumber' => 'N??mero telefone',
	'Class:TelephonyCI/Attribute:phonenumber+' => '',
));

//
// Class: Phone
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Phone' => 'Telefone',
	'Class:Phone+' => '',
));

//
// Class: MobilePhone
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:MobilePhone' => 'Telefone celular',
	'Class:MobilePhone+' => '',
	'Class:MobilePhone/Attribute:imei' => 'IMEI',
	'Class:MobilePhone/Attribute:imei+' => '',
	'Class:MobilePhone/Attribute:hw_pin' => 'Hardware PIN',
	'Class:MobilePhone/Attribute:hw_pin+' => '',
));

//
// Class: IPPhone
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPPhone' => 'Telefone IP',
	'Class:IPPhone+' => '',
));

//
// Class: Tablet
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Tablet' => 'Tablet',
	'Class:Tablet+' => '',
));

//
// Class: ConnectableCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:ConnectableCI' => 'Conectividades',
	'Class:ConnectableCI+' => 'F??sicos',
	'Class:ConnectableCI/Attribute:networkdevice_list' => 'Dispositivo de rede',
	'Class:ConnectableCI/Attribute:networkdevice_list+' => 'Todos os dispositivos de rede conectados nesse dispositivo',
	'Class:ConnectableCI/Attribute:physicalinterface_list' => 'Interface de rede',
	'Class:ConnectableCI/Attribute:physicalinterface_list+' => 'Todas as interfaces de rede',
));

//
// Class: DatacenterDevice
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:DatacenterDevice' => 'Dispositivos Datacenter',
	'Class:DatacenterDevice+' => '',
	'Class:DatacenterDevice/Attribute:rack_id' => 'Rack',
	'Class:DatacenterDevice/Attribute:rack_id+' => '',
	'Class:DatacenterDevice/Attribute:rack_name' => 'Nome rack',
	'Class:DatacenterDevice/Attribute:rack_name+' => '',
	'Class:DatacenterDevice/Attribute:enclosure_id' => 'Gaveta',
	'Class:DatacenterDevice/Attribute:enclosure_id+' => '',
	'Class:DatacenterDevice/Attribute:enclosure_name' => 'Nome gaveta',
	'Class:DatacenterDevice/Attribute:enclosure_name+' => '',
	'Class:DatacenterDevice/Attribute:nb_u' => 'Unidades',
	'Class:DatacenterDevice/Attribute:nb_u+' => '',
	'Class:DatacenterDevice/Attribute:managementip' => 'IP gerenciamento',
	'Class:DatacenterDevice/Attribute:managementip+' => '',
	'Class:DatacenterDevice/Attribute:powerA_id' => 'Fonte energia A',
	'Class:DatacenterDevice/Attribute:powerA_id+' => '',
	'Class:DatacenterDevice/Attribute:powerA_name' => 'Nome fonte energia A',
	'Class:DatacenterDevice/Attribute:powerA_name+' => '',
	'Class:DatacenterDevice/Attribute:powerB_id' => 'Fonte energia B',
	'Class:DatacenterDevice/Attribute:powerB_id+' => '',
	'Class:DatacenterDevice/Attribute:powerB_name' => 'Nome fonte energia B',
	'Class:DatacenterDevice/Attribute:powerB_name+' => '',
	'Class:DatacenterDevice/Attribute:fiberinterfacelist_list' => 'Portas FC',
	'Class:DatacenterDevice/Attribute:fiberinterfacelist_list+' => 'Todas as portas Fiber Channel para esse dispositivo',
	'Class:DatacenterDevice/Attribute:san_list' => 'SANs',
	'Class:DatacenterDevice/Attribute:san_list+' => 'Todos os switches SAN vinculados para esse dispositivo',
	'Class:DatacenterDevice/Attribute:redundancy' => 'Redund??ncia',
	'Class:DatacenterDevice/Attribute:redundancy/count' => 'O dispositivo est?? ativo se pelo menos uma conex??o de energia (A ou B) estiver ativa',
	// Unused yet
	'Class:DatacenterDevice/Attribute:redundancy/disabled' => 'O dispositivo est?? ativo se todas as conex??es de energia estiverem ativadas',
	'Class:DatacenterDevice/Attribute:redundancy/percent' => 'O dispositivo est?? ativo se pelo menos %1$s %% de suas conex??es de energia estiverem funcionando',
));

//
// Class: NetworkDevice
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NetworkDevice' => 'Dispositivo Rede',
	'Class:NetworkDevice+' => '',
	'Class:NetworkDevice/Attribute:networkdevicetype_id' => 'Tipo rede',
	'Class:NetworkDevice/Attribute:networkdevicetype_id+' => '',
	'Class:NetworkDevice/Attribute:networkdevicetype_name' => 'Nome tipo rede',
	'Class:NetworkDevice/Attribute:networkdevicetype_name+' => '',
	'Class:NetworkDevice/Attribute:connectablecis_list' => 'Dispositivos',
	'Class:NetworkDevice/Attribute:connectablecis_list+' => 'Todos os dispositivos vinculados para esse dispositivo de rede',
	'Class:NetworkDevice/Attribute:iosversion_id' => 'Vers??o IOS',
	'Class:NetworkDevice/Attribute:iosversion_id+' => '',
	'Class:NetworkDevice/Attribute:iosversion_name' => 'Nome vers??o IOS',
	'Class:NetworkDevice/Attribute:iosversion_name+' => '',
	'Class:NetworkDevice/Attribute:ram' => 'RAM',
	'Class:NetworkDevice/Attribute:ram+' => '',
));

//
// Class: Server
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Server' => 'Servidor',
	'Class:Server+' => '',
	'Class:Server/Attribute:osfamily_id' => 'Fam??lia OS',
	'Class:Server/Attribute:osfamily_id+' => '',
	'Class:Server/Attribute:osfamily_name' => 'Nome fam??lia OS',
	'Class:Server/Attribute:osfamily_name+' => '',
	'Class:Server/Attribute:osversion_id' => 'Vers??o OS',
	'Class:Server/Attribute:osversion_id+' => '',
	'Class:Server/Attribute:osversion_name' => 'Nome vers??o OS',
	'Class:Server/Attribute:osversion_name+' => '',
	'Class:Server/Attribute:oslicence_id' => 'Licen??a OS',
	'Class:Server/Attribute:oslicence_id+' => '',
	'Class:Server/Attribute:oslicence_name' => 'Nome licen??a OS',
	'Class:Server/Attribute:oslicence_name+' => '',
	'Class:Server/Attribute:cpu' => 'CPU',
	'Class:Server/Attribute:cpu+' => '',
	'Class:Server/Attribute:ram' => 'RAM',
	'Class:Server/Attribute:ram+' => '',
	'Class:Server/Attribute:logicalvolumes_list' => 'Volumes l??gicos',
	'Class:Server/Attribute:logicalvolumes_list+' => 'Todos os volumoes l??gicos vinculados para esse servidor',
));

//
// Class: StorageSystem
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:StorageSystem' => 'Sistema Storage',
	'Class:StorageSystem+' => '',
	'Class:StorageSystem/Attribute:logicalvolume_list' => 'Volumes l??gicos',
	'Class:StorageSystem/Attribute:logicalvolume_list+' => 'Todos os volumes l??gicos neste sistema storage',
));

//
// Class: SANSwitch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SANSwitch' => 'Switch SAN',
	'Class:SANSwitch+' => '',
	'Class:SANSwitch/Attribute:datacenterdevice_list' => 'Dispositivos',
	'Class:SANSwitch/Attribute:datacenterdevice_list+' => 'Todos os dispositivos vinculados para esse switch SAN',
));

//
// Class: TapeLibrary
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:TapeLibrary' => 'Tape Library',
	'Class:TapeLibrary+' => '',
	'Class:TapeLibrary/Attribute:tapes_list' => 'Fitas',
	'Class:TapeLibrary/Attribute:tapes_list+' => 'Todas as fitas para essa Tape library',
));

//
// Class: NAS
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NAS' => 'NAS',
	'Class:NAS+' => '',
	'Class:NAS/Attribute:nasfilesystem_list' => 'Sistemas de arquivos',
	'Class:NAS/Attribute:nasfilesystem_list+' => 'Todos os sistemas de arquivos para esse NAS',
));

//
// Class: PC
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PC' => 'PC',
	'Class:PC+' => '',
	'Class:PC/Attribute:osfamily_id' => 'Fam??lia OS',
	'Class:PC/Attribute:osfamily_id+' => '',
	'Class:PC/Attribute:osfamily_name' => 'Nome fam??lia OS',
	'Class:PC/Attribute:osfamily_name+' => '',
	'Class:PC/Attribute:osversion_id' => 'Vers??o OS',
	'Class:PC/Attribute:osversion_id+' => '',
	'Class:PC/Attribute:osversion_name' => 'Nome vers??o OS',
	'Class:PC/Attribute:osversion_name+' => '',
	'Class:PC/Attribute:cpu' => 'CPU',
	'Class:PC/Attribute:cpu+' => '',
	'Class:PC/Attribute:ram' => 'RAM',
	'Class:PC/Attribute:ram+' => '',
	'Class:PC/Attribute:type' => 'Tipo',
	'Class:PC/Attribute:type+' => '',
	'Class:PC/Attribute:type/Value:desktop' => 'Desktop',
	'Class:PC/Attribute:type/Value:desktop+' => 'Desktop',
	'Class:PC/Attribute:type/Value:laptop' => 'Laptop',
	'Class:PC/Attribute:type/Value:laptop+' => 'Laptop',
));

//
// Class: Printer
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Printer' => 'Impressoras',
	'Class:Printer+' => '',
));

//
// Class: PowerConnection
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PowerConnection' => 'Conex??o energia',
	'Class:PowerConnection+' => '',
));

//
// Class: PowerSource
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PowerSource' => 'Fonte energia',
	'Class:PowerSource+' => '',
	'Class:PowerSource/Attribute:pdus_list' => 'PDUs',
	'Class:PowerSource/Attribute:pdus_list+' => 'Todos os PDUs utilizando essa fonte de energia',
));

//
// Class: PDU
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PDU' => 'PDU',
	'Class:PDU+' => '',
	'Class:PDU/Attribute:rack_id' => 'Rack',
	'Class:PDU/Attribute:rack_id+' => '',
	'Class:PDU/Attribute:rack_name' => 'Nome rack',
	'Class:PDU/Attribute:rack_name+' => '',
	'Class:PDU/Attribute:powerstart_id' => 'Fonte energia',
	'Class:PDU/Attribute:powerstart_id+' => '',
	'Class:PDU/Attribute:powerstart_name' => 'Nome fonte de energia',
	'Class:PDU/Attribute:powerstart_name+' => '',
));

//
// Class: Peripheral
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Peripheral' => 'Perif??ricos',
	'Class:Peripheral+' => '',
));

//
// Class: Enclosure
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Enclosure' => 'Gaveta',
	'Class:Enclosure+' => '',
	'Class:Enclosure/Attribute:rack_id' => 'Rack',
	'Class:Enclosure/Attribute:rack_id+' => '',
	'Class:Enclosure/Attribute:rack_name' => 'Nome rack',
	'Class:Enclosure/Attribute:rack_name+' => '',
	'Class:Enclosure/Attribute:nb_u' => 'Unidades',
	'Class:Enclosure/Attribute:nb_u+' => '',
	'Class:Enclosure/Attribute:device_list' => 'Dispositivos',
	'Class:Enclosure/Attribute:device_list+' => 'Todos os dispositivos para essa gaveta',
));

//
// Class: ApplicationSolution
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:ApplicationSolution' => 'Solu????o aplica????o',
	'Class:ApplicationSolution+' => '',
	'Class:ApplicationSolution/Attribute:functionalcis_list' => 'CIs',
	'Class:ApplicationSolution/Attribute:functionalcis_list+' => 'Todos os itens de configura????o que comp??em essa solu????o de aplica????o',
	'Class:ApplicationSolution/Attribute:businessprocess_list' => 'Processos de neg??cio',
	'Class:ApplicationSolution/Attribute:businessprocess_list+' => 'Todos os processos do neg??cio dependente para essa solu????o de aplica????o',
	'Class:ApplicationSolution/Attribute:status' => 'Estado',
	'Class:ApplicationSolution/Attribute:status+' => '',
	'Class:ApplicationSolution/Attribute:status/Value:active' => 'Ativo',
	'Class:ApplicationSolution/Attribute:status/Value:active+' => 'Ativo',
	'Class:ApplicationSolution/Attribute:status/Value:inactive' => 'Inativo',
	'Class:ApplicationSolution/Attribute:status/Value:inactive+' => 'Inativo',
	'Class:ApplicationSolution/Attribute:redundancy' => 'An??lise de impacto: configura????o da redund??ncia',
	'Class:ApplicationSolution/Attribute:redundancy/disabled' => 'A solu????o est?? funcionando se todos os CIs estiverem funcionando',
	'Class:ApplicationSolution/Attribute:redundancy/count' => 'A solu????o est?? funcionando se no m??nimo %1$s CI(s) estiver(em) funcionando',
	'Class:ApplicationSolution/Attribute:redundancy/percent' => 'A solu????o est?? funcionando se no m??nimo %1$s %% dos CIs estiverem funcionando',
));

//
// Class: BusinessProcess
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:BusinessProcess' => 'Processos de neg??cio',
	'Class:BusinessProcess+' => '',
	'Class:BusinessProcess/Attribute:applicationsolutions_list' => 'Solu????o aplica????o',
	'Class:BusinessProcess/Attribute:applicationsolutions_list+' => 'Todas as solu????es de aplica????es que impactam este processo de neg??cio',
	'Class:BusinessProcess/Attribute:status' => 'Estado',
	'Class:BusinessProcess/Attribute:status+' => '',
	'Class:BusinessProcess/Attribute:status/Value:active' => 'Ativo',
	'Class:BusinessProcess/Attribute:status/Value:active+' => 'Ativo',
	'Class:BusinessProcess/Attribute:status/Value:inactive' => 'Inativo',
	'Class:BusinessProcess/Attribute:status/Value:inactive+' => 'Inativo',
));

//
// Class: SoftwareInstance
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SoftwareInstance' => 'Inst??ncia Software',
	'Class:SoftwareInstance+' => '',
	'Class:SoftwareInstance/Attribute:system_id' => 'Sistema',
	'Class:SoftwareInstance/Attribute:system_id+' => '',
	'Class:SoftwareInstance/Attribute:system_name' => 'Nome sistema',
	'Class:SoftwareInstance/Attribute:system_name+' => '',
	'Class:SoftwareInstance/Attribute:software_id' => 'Software',
	'Class:SoftwareInstance/Attribute:software_id+' => '',
	'Class:SoftwareInstance/Attribute:software_name' => 'Nome software',
	'Class:SoftwareInstance/Attribute:software_name+' => '',
	'Class:SoftwareInstance/Attribute:softwarelicence_id' => 'Licen??a software',
	'Class:SoftwareInstance/Attribute:softwarelicence_id+' => '',
	'Class:SoftwareInstance/Attribute:softwarelicence_name' => 'Nome licen??a software',
	'Class:SoftwareInstance/Attribute:softwarelicence_name+' => '',
	'Class:SoftwareInstance/Attribute:path' => 'Caminho',
	'Class:SoftwareInstance/Attribute:path+' => '',
	'Class:SoftwareInstance/Attribute:status' => 'Estado',
	'Class:SoftwareInstance/Attribute:status+' => '',
	'Class:SoftwareInstance/Attribute:status/Value:active' => 'Ativo',
	'Class:SoftwareInstance/Attribute:status/Value:active+' => 'Ativo',
	'Class:SoftwareInstance/Attribute:status/Value:inactive' => 'Inativo',
	'Class:SoftwareInstance/Attribute:status/Value:inactive+' => 'Inativo',
));

//
// Class: Middleware
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Middleware' => 'Middleware',
	'Class:Middleware+' => '',
	'Class:Middleware/Attribute:middlewareinstance_list' => 'Inst??ncia Middleware',
	'Class:Middleware/Attribute:middlewareinstance_list+' => 'Todos as inst??ncia middleware fornecida por essa middleware',
));

//
// Class: DBServer
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:DBServer' => 'Servi??o DB',
	'Class:DBServer+' => '',
	'Class:DBServer/Attribute:dbschema_list' => 'Schemas DB',
	'Class:DBServer/Attribute:dbschema_list+' => 'Todos os schemas para esse banco de dados',
));

//
// Class: WebServer
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:WebServer' => 'Servi??o Web',
	'Class:WebServer+' => '',
	'Class:WebServer/Attribute:webapp_list' => 'Aplica????es Web',
	'Class:WebServer/Attribute:webapp_list+' => 'Todas as aplica????es web dispon??veis para esse servi??o web',
));

//
// Class: PCSoftware
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PCSoftware' => 'PC Software',
	'Class:PCSoftware+' => '',
));

//
// Class: OtherSoftware
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:OtherSoftware' => 'Outros software',
	'Class:OtherSoftware+' => '',
));

//
// Class: MiddlewareInstance
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:MiddlewareInstance' => 'Inst??ncia Middleware',
	'Class:MiddlewareInstance+' => '',
	'Class:MiddlewareInstance/Attribute:middleware_id' => 'Middleware',
	'Class:MiddlewareInstance/Attribute:middleware_id+' => '',
	'Class:MiddlewareInstance/Attribute:middleware_name' => 'Nome middleware',
	'Class:MiddlewareInstance/Attribute:middleware_name+' => '',
));

//
// Class: DatabaseSchema
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:DatabaseSchema' => 'Schema Banco Dados',
	'Class:DatabaseSchema+' => '',
	'Class:DatabaseSchema/Attribute:dbserver_id' => 'Servi??o DB',
	'Class:DatabaseSchema/Attribute:dbserver_id+' => '',
	'Class:DatabaseSchema/Attribute:dbserver_name' => 'Nome servi??o DB',
	'Class:DatabaseSchema/Attribute:dbserver_name+' => '',
));

//
// Class: WebApplication
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:WebApplication' => 'Aplica????o Web',
	'Class:WebApplication+' => '',
	'Class:WebApplication/Attribute:webserver_id' => 'Servi??o Web',
	'Class:WebApplication/Attribute:webserver_id+' => '',
	'Class:WebApplication/Attribute:webserver_name' => 'Nome servi??o Web',
	'Class:WebApplication/Attribute:webserver_name+' => '',
	'Class:WebApplication/Attribute:url' => 'URL',
	'Class:WebApplication/Attribute:url+' => '',
));


//
// Class: VirtualDevice
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:VirtualDevice' => 'Dispositivo Virtual',
	'Class:VirtualDevice+' => '',
	'Class:VirtualDevice/Attribute:status' => 'Estado',
	'Class:VirtualDevice/Attribute:status+' => '',
	'Class:VirtualDevice/Attribute:status/Value:implementation' => 'Implementa????o',
	'Class:VirtualDevice/Attribute:status/Value:implementation+' => 'Implementa????o',
	'Class:VirtualDevice/Attribute:status/Value:obsolete' => 'Obsoleto',
	'Class:VirtualDevice/Attribute:status/Value:obsolete+' => 'Obsoleto',
	'Class:VirtualDevice/Attribute:status/Value:production' => 'Produ????o',
	'Class:VirtualDevice/Attribute:status/Value:production+' => 'Produ????o',
	'Class:VirtualDevice/Attribute:status/Value:stock' => 'Suporte',
	'Class:VirtualDevice/Attribute:status/Value:stock+' => 'Suporte',
	'Class:VirtualDevice/Attribute:logicalvolumes_list' => 'Volume l??gico',
	'Class:VirtualDevice/Attribute:logicalvolumes_list+' => 'Todos os volumes l??gicos vinculados para esse dispositivo',
));

//
// Class: VirtualHost
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:VirtualHost' => 'Host virtual',
	'Class:VirtualHost+' => '',
	'Class:VirtualHost/Attribute:virtualmachine_list' => 'M??quinas Virtuais',
	'Class:VirtualHost/Attribute:virtualmachine_list+' => 'Todas as m??quinas virtuais hospedados para esse Host',
));

//
// Class: Hypervisor
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Hypervisor' => 'Hypervisor',
	'Class:Hypervisor+' => '',
	'Class:Hypervisor/Attribute:farm_id' => 'Cluster/HA',
	'Class:Hypervisor/Attribute:farm_id+' => '',
	'Class:Hypervisor/Attribute:farm_name' => 'Nome Cluster/HA',
	'Class:Hypervisor/Attribute:farm_name+' => '',
	'Class:Hypervisor/Attribute:server_id' => 'Servidor',
	'Class:Hypervisor/Attribute:server_id+' => '',
	'Class:Hypervisor/Attribute:server_name' => 'Nome servidor',
	'Class:Hypervisor/Attribute:server_name+' => '',
));

//
// Class: Farm
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Farm' => 'Cluster/HA',
	'Class:Farm+' => '',
	'Class:Farm/Attribute:hypervisor_list' => 'Hypervisors',
	'Class:Farm/Attribute:hypervisor_list+' => 'Todos os hypervisors que compoem esse Cluster/HA',
	'Class:Farm/Attribute:redundancy' => 'Alta disponibilidade',
	'Class:Farm/Attribute:redundancy/disabled' => 'A fazenda est?? em p?? se todos os hipervisores estiverem em alta',
	'Class:Farm/Attribute:redundancy/count' => 'O farm est?? ativo se pelo menos %1$s hypervisor(es) estiver (??o) para cima',
	'Class:Farm/Attribute:redundancy/percent' => 'A fazenda est?? ativa se pelo menos %1$s %% dos hipervisores estiverem em alta',
));

//
// Class: VirtualMachine
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:VirtualMachine' => 'M??quina virtual',
	'Class:VirtualMachine+' => '',
	'Class:VirtualMachine/Attribute:virtualhost_id' => 'Host virtual',
	'Class:VirtualMachine/Attribute:virtualhost_id+' => '',
	'Class:VirtualMachine/Attribute:virtualhost_name' => 'Nome Host virtual',
	'Class:VirtualMachine/Attribute:virtualhost_name+' => '',
	'Class:VirtualMachine/Attribute:osfamily_id' => 'Fam??lia OS',
	'Class:VirtualMachine/Attribute:osfamily_id+' => '',
	'Class:VirtualMachine/Attribute:osfamily_name' => 'Nome fam??lia OS',
	'Class:VirtualMachine/Attribute:osfamily_name+' => '',
	'Class:VirtualMachine/Attribute:osversion_id' => 'Vers??o OS',
	'Class:VirtualMachine/Attribute:osversion_id+' => '',
	'Class:VirtualMachine/Attribute:osversion_name' => 'Nome vers??o OS',
	'Class:VirtualMachine/Attribute:osversion_name+' => '',
	'Class:VirtualMachine/Attribute:oslicence_id' => 'Licen??a OS',
	'Class:VirtualMachine/Attribute:oslicence_id+' => '',
	'Class:VirtualMachine/Attribute:oslicence_name' => 'Nome licen??a OS',
	'Class:VirtualMachine/Attribute:oslicence_name+' => '',
	'Class:VirtualMachine/Attribute:cpu' => 'CPU',
	'Class:VirtualMachine/Attribute:cpu+' => '',
	'Class:VirtualMachine/Attribute:ram' => 'RAM',
	'Class:VirtualMachine/Attribute:ram+' => '',
	'Class:VirtualMachine/Attribute:managementip' => 'IP',
	'Class:VirtualMachine/Attribute:managementip+' => '',
	'Class:VirtualMachine/Attribute:logicalinterface_list' => 'Placas de rede',
	'Class:VirtualMachine/Attribute:logicalinterface_list+' => 'Todas as placas de rede',
));

//
// Class: LogicalVolume
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:LogicalVolume' => 'Volume l??gico',
	'Class:LogicalVolume+' => '',
	'Class:LogicalVolume/Attribute:name' => 'Nome',
	'Class:LogicalVolume/Attribute:name+' => '',
	'Class:LogicalVolume/Attribute:lun_id' => 'LUN ID',
	'Class:LogicalVolume/Attribute:lun_id+' => '',
	'Class:LogicalVolume/Attribute:description' => 'Descri????o',
	'Class:LogicalVolume/Attribute:description+' => '',
	'Class:LogicalVolume/Attribute:raid_level' => 'Raid n??vel',
	'Class:LogicalVolume/Attribute:raid_level+' => '',
	'Class:LogicalVolume/Attribute:size' => 'Tamanho',
	'Class:LogicalVolume/Attribute:size+' => '',
	'Class:LogicalVolume/Attribute:storagesystem_id' => 'Sistema arquivo',
	'Class:LogicalVolume/Attribute:storagesystem_id+' => '',
	'Class:LogicalVolume/Attribute:storagesystem_name' => 'Nome sistema arquivo',
	'Class:LogicalVolume/Attribute:storagesystem_name+' => '',
	'Class:LogicalVolume/Attribute:servers_list' => 'Servidores',
	'Class:LogicalVolume/Attribute:servers_list+' => 'Todos os servidores usando esse volume',
	'Class:LogicalVolume/Attribute:virtualdevices_list' => 'Dispositivos virtuais',
	'Class:LogicalVolume/Attribute:virtualdevices_list+' => 'Todos os dispositivos virtuais usando esse volume',
));

//
// Class: lnkServerToVolume
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkServerToVolume' => 'Link Servidor / Volume',
	'Class:lnkServerToVolume+' => '',
	'Class:lnkServerToVolume/Attribute:volume_id' => 'Volume',
	'Class:lnkServerToVolume/Attribute:volume_id+' => '',
	'Class:lnkServerToVolume/Attribute:volume_name' => 'Nome volume',
	'Class:lnkServerToVolume/Attribute:volume_name+' => '',
	'Class:lnkServerToVolume/Attribute:server_id' => 'Servidor',
	'Class:lnkServerToVolume/Attribute:server_id+' => '',
	'Class:lnkServerToVolume/Attribute:server_name' => 'Nome servidor',
	'Class:lnkServerToVolume/Attribute:server_name+' => '',
	'Class:lnkServerToVolume/Attribute:size_used' => 'Tamanho usado',
	'Class:lnkServerToVolume/Attribute:size_used+' => '',
));

//
// Class: lnkVirtualDeviceToVolume
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkVirtualDeviceToVolume' => 'Link Dispositivo Virtual / Volume',
	'Class:lnkVirtualDeviceToVolume+' => '',
	'Class:lnkVirtualDeviceToVolume/Attribute:volume_id' => 'Volume',
	'Class:lnkVirtualDeviceToVolume/Attribute:volume_id+' => '',
	'Class:lnkVirtualDeviceToVolume/Attribute:volume_name' => 'Nome volume',
	'Class:lnkVirtualDeviceToVolume/Attribute:volume_name+' => '',
	'Class:lnkVirtualDeviceToVolume/Attribute:virtualdevice_id' => 'Dispositivo virtual',
	'Class:lnkVirtualDeviceToVolume/Attribute:virtualdevice_id+' => '',
	'Class:lnkVirtualDeviceToVolume/Attribute:virtualdevice_name' => 'Nome dispositivo virtual',
	'Class:lnkVirtualDeviceToVolume/Attribute:virtualdevice_name+' => '',
	'Class:lnkVirtualDeviceToVolume/Attribute:size_used' => 'Tamanho usado',
	'Class:lnkVirtualDeviceToVolume/Attribute:size_used+' => '',
));

//
// Class: lnkSanToDatacenterDevice
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkSanToDatacenterDevice' => 'Link SAN / Dispositivo Datacenter',
	'Class:lnkSanToDatacenterDevice+' => '',
	'Class:lnkSanToDatacenterDevice/Attribute:san_id' => 'Switch SAN',
	'Class:lnkSanToDatacenterDevice/Attribute:san_id+' => '',
	'Class:lnkSanToDatacenterDevice/Attribute:san_name' => 'Nome switch SAN',
	'Class:lnkSanToDatacenterDevice/Attribute:san_name+' => '',
	'Class:lnkSanToDatacenterDevice/Attribute:datacenterdevice_id' => 'Dispositivo',
	'Class:lnkSanToDatacenterDevice/Attribute:datacenterdevice_id+' => '',
	'Class:lnkSanToDatacenterDevice/Attribute:datacenterdevice_name' => 'Nome Dispositivo',
	'Class:lnkSanToDatacenterDevice/Attribute:datacenterdevice_name+' => '',
	'Class:lnkSanToDatacenterDevice/Attribute:san_port' => 'FC SAN',
	'Class:lnkSanToDatacenterDevice/Attribute:san_port+' => '',
	'Class:lnkSanToDatacenterDevice/Attribute:datacenterdevice_port' => 'Dispositivo FC',
	'Class:lnkSanToDatacenterDevice/Attribute:datacenterdevice_port+' => '',
));

//
// Class: Tape
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Tape' => 'Fita',
	'Class:Tape+' => '',
	'Class:Tape/Attribute:name' => 'Nome',
	'Class:Tape/Attribute:name+' => '',
	'Class:Tape/Attribute:description' => 'Descri????o',
	'Class:Tape/Attribute:description+' => '',
	'Class:Tape/Attribute:size' => 'Tamanho',
	'Class:Tape/Attribute:size+' => '',
	'Class:Tape/Attribute:tapelibrary_id' => 'Tape library',
	'Class:Tape/Attribute:tapelibrary_id+' => '',
	'Class:Tape/Attribute:tapelibrary_name' => 'Nome Tape library',
	'Class:Tape/Attribute:tapelibrary_name+' => '',
));

//
// Class: NASFileSystem
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NASFileSystem' => 'Sistema arquivo NAS',
	'Class:NASFileSystem+' => '',
	'Class:NASFileSystem/Attribute:name' => 'Nome',
	'Class:NASFileSystem/Attribute:name+' => '',
	'Class:NASFileSystem/Attribute:description' => 'Descri????o',
	'Class:NASFileSystem/Attribute:description+' => '',
	'Class:NASFileSystem/Attribute:raid_level' => 'Raid n??vel',
	'Class:NASFileSystem/Attribute:raid_level+' => '',
	'Class:NASFileSystem/Attribute:size' => 'Tamanho',
	'Class:NASFileSystem/Attribute:size+' => '',
	'Class:NASFileSystem/Attribute:nas_id' => 'NAS',
	'Class:NASFileSystem/Attribute:nas_id+' => '',
	'Class:NASFileSystem/Attribute:nas_name' => 'Nome NAS',
	'Class:NASFileSystem/Attribute:nas_name+' => '',
));

//
// Class: Software
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Software' => 'Software',
	'Class:Software+' => '',
	'Class:Software/Attribute:name' => 'Nome',
	'Class:Software/Attribute:name+' => '',
	'Class:Software/Attribute:vendor' => 'Fabricante',
	'Class:Software/Attribute:vendor+' => '',
	'Class:Software/Attribute:version' => 'Vers??o',
	'Class:Software/Attribute:version+' => '',
	'Class:Software/Attribute:documents_list' => 'Documentos',
	'Class:Software/Attribute:documents_list+' => 'Todos os documentos vinculados a esse software',
	'Class:Software/Attribute:type' => 'Tipo',
	'Class:Software/Attribute:type+' => '',
	'Class:Software/Attribute:type/Value:DBServer' => 'Servi??o DB',
	'Class:Software/Attribute:type/Value:DBServer+' => 'Servi??o DB',
	'Class:Software/Attribute:type/Value:Middleware' => 'Middleware',
	'Class:Software/Attribute:type/Value:Middleware+' => 'Middleware',
	'Class:Software/Attribute:type/Value:OtherSoftware' => 'Outro Software',
	'Class:Software/Attribute:type/Value:OtherSoftware+' => 'Outro Software',
	'Class:Software/Attribute:type/Value:PCSoftware' => 'PC Software',
	'Class:Software/Attribute:type/Value:PCSoftware+' => 'PC Software',
	'Class:Software/Attribute:type/Value:WebServer' => 'Servi??o Web',
	'Class:Software/Attribute:type/Value:WebServer+' => 'Servi??o Web',
	'Class:Software/Attribute:softwareinstance_list' => 'Inst??ncias Software',
	'Class:Software/Attribute:softwareinstance_list+' => 'Todas as inst??ncias software para esse software',
	'Class:Software/Attribute:softwarepatch_list' => 'Software Patches',
	'Class:Software/Attribute:softwarepatch_list+' => 'Todos os patchs para esse software',
	'Class:Software/Attribute:softwarelicence_list' => 'Licen??a Software',
	'Class:Software/Attribute:softwarelicence_list+' => 'Todas as licen??as software para esse software',
));

//
// Class: Patch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Patch' => 'Patch',
	'Class:Patch+' => '',
	'Class:Patch/Attribute:name' => 'Nome',
	'Class:Patch/Attribute:name+' => '',
	'Class:Patch/Attribute:documents_list' => 'Documentos',
	'Class:Patch/Attribute:documents_list+' => 'Todos os documentos vinculados a esse patch',
	'Class:Patch/Attribute:description' => 'Descri????o',
	'Class:Patch/Attribute:description+' => '',
	'Class:Patch/Attribute:finalclass' => 'Tipo',
	'Class:Patch/Attribute:finalclass+' => '',
));

//
// Class: OSPatch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:OSPatch' => 'OS Patch',
	'Class:OSPatch+' => '',
	'Class:OSPatch/Attribute:functionalcis_list' => 'Dispositivos',
	'Class:OSPatch/Attribute:functionalcis_list+' => 'Todos os sistemas onde o patch est?? instalado',
	'Class:OSPatch/Attribute:osversion_id' => 'Vers??o OS',
	'Class:OSPatch/Attribute:osversion_id+' => '',
	'Class:OSPatch/Attribute:osversion_name' => 'Nome vers??o OS',
	'Class:OSPatch/Attribute:osversion_name+' => '',
));

//
// Class: SoftwarePatch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SoftwarePatch' => 'Software Patch',
	'Class:SoftwarePatch+' => '',
	'Class:SoftwarePatch/Attribute:software_id' => 'Software',
	'Class:SoftwarePatch/Attribute:software_id+' => '',
	'Class:SoftwarePatch/Attribute:software_name' => 'Nome software',
	'Class:SoftwarePatch/Attribute:software_name+' => '',
	'Class:SoftwarePatch/Attribute:softwareinstances_list' => 'Inst??ncias Software',
	'Class:SoftwarePatch/Attribute:softwareinstances_list+' => 'Todos os sistemas onde software patch est?? instalado',
));

//
// Class: Licence
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Licence' => 'Licen??a',
	'Class:Licence+' => '',
	'Class:Licence/Attribute:name' => 'Nome',
	'Class:Licence/Attribute:name+' => '',
	'Class:Licence/Attribute:documents_list' => 'Documentos',
	'Class:Licence/Attribute:documents_list+' => 'Todos os documentos vinculados a essa licen??a',
	'Class:Licence/Attribute:org_id' => 'Organiza????o',
	'Class:Licence/Attribute:org_id+' => '',
	'Class:Licence/Attribute:organization_name' => 'Nome organiza????o',
	'Class:Licence/Attribute:organization_name+' => 'Nome comum',
	'Class:Licence/Attribute:usage_limit' => 'Limite usado',
	'Class:Licence/Attribute:usage_limit+' => '',
	'Class:Licence/Attribute:description' => 'Descri????o',
	'Class:Licence/Attribute:description+' => '',
	'Class:Licence/Attribute:start_date' => 'Data in??cio',
	'Class:Licence/Attribute:start_date+' => '',
	'Class:Licence/Attribute:end_date' => 'Data final',
	'Class:Licence/Attribute:end_date+' => '',
	'Class:Licence/Attribute:licence_key' => 'Chave',
	'Class:Licence/Attribute:licence_key+' => '',
	'Class:Licence/Attribute:perpetual' => 'Permanente',
	'Class:Licence/Attribute:perpetual+' => '',
	'Class:Licence/Attribute:perpetual/Value:no' => 'N??o',
	'Class:Licence/Attribute:perpetual/Value:no+' => 'N??o',
	'Class:Licence/Attribute:perpetual/Value:yes' => 'Sim',
	'Class:Licence/Attribute:perpetual/Value:yes+' => 'sim',
	'Class:Licence/Attribute:finalclass' => 'Tipo',
	'Class:Licence/Attribute:finalclass+' => '',
));

//
// Class: OSLicence
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:OSLicence' => 'Licen??a OS',
	'Class:OSLicence+' => '',
	'Class:OSLicence/Attribute:osversion_id' => 'Vers??o OS',
	'Class:OSLicence/Attribute:osversion_id+' => '',
	'Class:OSLicence/Attribute:osversion_name' => 'Nome vers??o OS',
	'Class:OSLicence/Attribute:osversion_name+' => '',
	'Class:OSLicence/Attribute:virtualmachines_list' => 'M??quinas virtuais',
	'Class:OSLicence/Attribute:virtualmachines_list+' => 'Todas as m??quinas virtuais onde essa licen??a ?? usada',
	'Class:OSLicence/Attribute:servers_list' => 'servidores',
	'Class:OSLicence/Attribute:servers_list+' => 'Todos os servidores onde essa licen??a ?? usada',
));

//
// Class: SoftwareLicence
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SoftwareLicence' => 'Licen??a software',
	'Class:SoftwareLicence+' => '',
	'Class:SoftwareLicence/Attribute:software_id' => 'Software',
	'Class:SoftwareLicence/Attribute:software_id+' => '',
	'Class:SoftwareLicence/Attribute:software_name' => 'Nome software',
	'Class:SoftwareLicence/Attribute:software_name+' => '',
	'Class:SoftwareLicence/Attribute:softwareinstance_list' => 'Inst??ncias software',
	'Class:SoftwareLicence/Attribute:softwareinstance_list+' => 'Todos os sistemas onde essa licen??a ?? usada',
));

//
// Class: lnkDocumentToLicence
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkDocumentToLicence' => 'Link Documento / Licen??a',
	'Class:lnkDocumentToLicence+' => '',
	'Class:lnkDocumentToLicence/Attribute:licence_id' => 'Licen??a',
	'Class:lnkDocumentToLicence/Attribute:licence_id+' => '',
	'Class:lnkDocumentToLicence/Attribute:licence_name' => 'Nome licen??a',
	'Class:lnkDocumentToLicence/Attribute:licence_name+' => '',
	'Class:lnkDocumentToLicence/Attribute:document_id' => 'Documento',
	'Class:lnkDocumentToLicence/Attribute:document_id+' => '',
	'Class:lnkDocumentToLicence/Attribute:document_name' => 'Nome documento',
	'Class:lnkDocumentToLicence/Attribute:document_name+' => '',
));

//
// Class: OSVersion
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:OSVersion' => 'Vers??o OS',
	'Class:OSVersion+' => '',
	'Class:OSVersion/Attribute:osfamily_id' => 'Fam??lia OS',
	'Class:OSVersion/Attribute:osfamily_id+' => '',
	'Class:OSVersion/Attribute:osfamily_name' => 'Nome fam??lia OS',
	'Class:OSVersion/Attribute:osfamily_name+' => '',
));

//
// Class: OSFamily
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:OSFamily' => 'Fam??lia OS',
	'Class:OSFamily+' => '',
));

//
// Class: Brand
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Brand' => 'Fabricante',
	'Class:Brand+' => '',
	'Class:Brand/Attribute:physicaldevices_list' => 'Dispositivos f??sicos',
	'Class:Brand/Attribute:physicaldevices_list+' => 'Todos os dispositivos f??sicos correspondentes a essa fabricante',
	'Class:Brand/UniquenessRule:name+' => 'O nome deve ser ??nico',
	'Class:Brand/UniquenessRule:name' => 'Essa marca j?? existe',
));

//
// Class: Model
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Model' => 'Modelo',
	'Class:Model+' => '',
	'Class:Model/Attribute:brand_id' => 'Fabricante',
	'Class:Model/Attribute:brand_id+' => '',
	'Class:Model/Attribute:brand_name' => 'Nome fabricante',
	'Class:Model/Attribute:brand_name+' => '',
	'Class:Model/Attribute:type' => 'Tipo dispositivo',
	'Class:Model/Attribute:type+' => '',
	'Class:Model/Attribute:type/Value:PowerSource' => 'Fonte energia',
	'Class:Model/Attribute:type/Value:PowerSource+' => 'Fonte energia',
	'Class:Model/Attribute:type/Value:DiskArray' => 'Array disco',
	'Class:Model/Attribute:type/Value:DiskArray+' => 'Array disco',
	'Class:Model/Attribute:type/Value:Enclosure' => 'Gaveta',
	'Class:Model/Attribute:type/Value:Enclosure+' => 'Gaveta',
	'Class:Model/Attribute:type/Value:IPPhone' => 'Telefone IP',
	'Class:Model/Attribute:type/Value:IPPhone+' => 'Telefone IP',
	'Class:Model/Attribute:type/Value:MobilePhone' => 'Telefone celular',
	'Class:Model/Attribute:type/Value:MobilePhone+' => 'Telefone celular',
	'Class:Model/Attribute:type/Value:NAS' => 'NAS',
	'Class:Model/Attribute:type/Value:NAS+' => 'NAS',
	'Class:Model/Attribute:type/Value:NetworkDevice' => 'Dispositivo rede',
	'Class:Model/Attribute:type/Value:NetworkDevice+' => 'Dispositivo rede',
	'Class:Model/Attribute:type/Value:PC' => 'PC',
	'Class:Model/Attribute:type/Value:PC+' => 'PC',
	'Class:Model/Attribute:type/Value:PDU' => 'PDU',
	'Class:Model/Attribute:type/Value:PDU+' => 'PDU',
	'Class:Model/Attribute:type/Value:Peripheral' => 'Perif??rico',
	'Class:Model/Attribute:type/Value:Peripheral+' => 'Perif??rico',
	'Class:Model/Attribute:type/Value:Printer' => 'Impressora',
	'Class:Model/Attribute:type/Value:Printer+' => 'Impressora',
	'Class:Model/Attribute:type/Value:Rack' => 'Rack',
	'Class:Model/Attribute:type/Value:Rack+' => 'Rack',
	'Class:Model/Attribute:type/Value:SANSwitch' => 'Switch SAN',
	'Class:Model/Attribute:type/Value:SANSwitch+' => 'Switch SAN',
	'Class:Model/Attribute:type/Value:Server' => 'Servidor',
	'Class:Model/Attribute:type/Value:Server+' => 'Servidor',
	'Class:Model/Attribute:type/Value:StorageSystem' => 'Sistema Storage',
	'Class:Model/Attribute:type/Value:StorageSystem+' => 'Sistema Storage',
	'Class:Model/Attribute:type/Value:Tablet' => 'Tablet',
	'Class:Model/Attribute:type/Value:Tablet+' => 'Tablet',
	'Class:Model/Attribute:type/Value:TapeLibrary' => 'Tape Library',
	'Class:Model/Attribute:type/Value:TapeLibrary+' => 'Tape Library',
	'Class:Model/Attribute:type/Value:Phone' => 'Telefone',
	'Class:Model/Attribute:type/Value:Phone+' => 'Telefone',
	'Class:Model/Attribute:physicaldevices_list' => 'Dispositivo f??sico',
	'Class:Model/Attribute:physicaldevices_list+' => 'Todos os dispositivos f??sicos correspondentes a esse modelo',
	'Class:Model/UniquenessRule:name_brand+' => 'O nome deve ser ??nico na marca',
	'Class:Model/UniquenessRule:name_brand' => 'este modelo j?? existe para essa marca',
));

//
// Class: NetworkDeviceType
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NetworkDeviceType' => 'Tipo dispositivo rede',
	'Class:NetworkDeviceType+' => '',
	'Class:NetworkDeviceType/Attribute:networkdevicesdevices_list' => 'Dispositivo rede',
	'Class:NetworkDeviceType/Attribute:networkdevicesdevices_list+' => 'Todos os dispositivo de rede correspondentes a esse tipo',
));

//
// Class: IOSVersion
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IOSVersion' => 'Vers??o IOS',
	'Class:IOSVersion+' => '',
	'Class:IOSVersion/Attribute:brand_id' => 'Fabricante',
	'Class:IOSVersion/Attribute:brand_id+' => '',
	'Class:IOSVersion/Attribute:brand_name' => 'Nome fabricante',
	'Class:IOSVersion/Attribute:brand_name+' => '',
));

//
// Class: lnkDocumentToPatch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkDocumentToPatch' => 'Link Documento / Patch',
	'Class:lnkDocumentToPatch+' => '',
	'Class:lnkDocumentToPatch/Attribute:patch_id' => 'Patch',
	'Class:lnkDocumentToPatch/Attribute:patch_id+' => '',
	'Class:lnkDocumentToPatch/Attribute:patch_name' => 'Nome patch',
	'Class:lnkDocumentToPatch/Attribute:patch_name+' => '',
	'Class:lnkDocumentToPatch/Attribute:document_id' => 'Documento',
	'Class:lnkDocumentToPatch/Attribute:document_id+' => '',
	'Class:lnkDocumentToPatch/Attribute:document_name' => 'Nome documento',
	'Class:lnkDocumentToPatch/Attribute:document_name+' => '',
));

//
// Class: lnkSoftwareInstanceToSoftwarePatch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkSoftwareInstanceToSoftwarePatch' => 'Link Inst??ncia Software / Software Patch',
	'Class:lnkSoftwareInstanceToSoftwarePatch+' => '',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwarepatch_id' => 'Software patch',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwarepatch_id+' => '',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwarepatch_name' => 'Nome software patch',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwarepatch_name+' => '',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwareinstance_id' => 'Inst??ncia software',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwareinstance_id+' => '',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwareinstance_name' => 'Nome inst??ncia software',
	'Class:lnkSoftwareInstanceToSoftwarePatch/Attribute:softwareinstance_name+' => '',
));

//
// Class: lnkFunctionalCIToOSPatch
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkFunctionalCIToOSPatch' => 'Link CI / OS patch',
	'Class:lnkFunctionalCIToOSPatch+' => '',
	'Class:lnkFunctionalCIToOSPatch/Attribute:ospatch_id' => 'OS patch',
	'Class:lnkFunctionalCIToOSPatch/Attribute:ospatch_id+' => '',
	'Class:lnkFunctionalCIToOSPatch/Attribute:ospatch_name' => 'Nome OS patch',
	'Class:lnkFunctionalCIToOSPatch/Attribute:ospatch_name+' => '',
	'Class:lnkFunctionalCIToOSPatch/Attribute:functionalci_id' => 'CIs',
	'Class:lnkFunctionalCIToOSPatch/Attribute:functionalci_id+' => '',
	'Class:lnkFunctionalCIToOSPatch/Attribute:functionalci_name' => 'Nome CI',
	'Class:lnkFunctionalCIToOSPatch/Attribute:functionalci_name+' => '',
));

//
// Class: lnkDocumentToSoftware
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkDocumentToSoftware' => 'Link Documento / Software',
	'Class:lnkDocumentToSoftware+' => '',
	'Class:lnkDocumentToSoftware/Attribute:software_id' => 'Software',
	'Class:lnkDocumentToSoftware/Attribute:software_id+' => '',
	'Class:lnkDocumentToSoftware/Attribute:software_name' => 'Nome software',
	'Class:lnkDocumentToSoftware/Attribute:software_name+' => '',
	'Class:lnkDocumentToSoftware/Attribute:document_id' => 'Documento',
	'Class:lnkDocumentToSoftware/Attribute:document_id+' => '',
	'Class:lnkDocumentToSoftware/Attribute:document_name' => 'Nome documento',
	'Class:lnkDocumentToSoftware/Attribute:document_name+' => '',
));

//
// Class: Subnet
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Subnet' => 'Sub-rede',
	'Class:Subnet+' => '',
	'Class:Subnet/Attribute:description' => 'Descri????o',
	'Class:Subnet/Attribute:description+' => '',
	'Class:Subnet/Attribute:subnet_name' => 'Nome Sub-rede',
	'Class:Subnet/Attribute:subnet_name+' => '',
	'Class:Subnet/Attribute:org_id' => 'Organiza????o',
	'Class:Subnet/Attribute:org_id+' => '',
	'Class:Subnet/Attribute:org_name' => 'Nome',
	'Class:Subnet/Attribute:org_name+' => 'Nome comum',
	'Class:Subnet/Attribute:ip' => 'IP',
	'Class:Subnet/Attribute:ip+' => '',
	'Class:Subnet/Attribute:ip_mask' => 'M??scara rede',
	'Class:Subnet/Attribute:ip_mask+' => '',
	'Class:Subnet/Attribute:vlans_list' => 'VLANs',
	'Class:Subnet/Attribute:vlans_list+' => '',
));

//
// Class: VLAN
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:VLAN' => 'VLAN',
	'Class:VLAN+' => '',
	'Class:VLAN/Attribute:vlan_tag' => 'Nome VLAN',
	'Class:VLAN/Attribute:vlan_tag+' => '',
	'Class:VLAN/Attribute:description' => 'Descri????o',
	'Class:VLAN/Attribute:description+' => '',
	'Class:VLAN/Attribute:org_id' => 'Organiza????o',
	'Class:VLAN/Attribute:org_id+' => '',
	'Class:VLAN/Attribute:org_name' => 'Nome organiza????o',
	'Class:VLAN/Attribute:org_name+' => 'Nome comum',
	'Class:VLAN/Attribute:subnets_list' => 'Sub-redes',
	'Class:VLAN/Attribute:subnets_list+' => '',
	'Class:VLAN/Attribute:physicalinterfaces_list' => 'Interfaces rede f??sica',
	'Class:VLAN/Attribute:physicalinterfaces_list+' => '',
));

//
// Class: lnkSubnetToVLAN
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkSubnetToVLAN' => 'Link Sub-rede / VLAN',
	'Class:lnkSubnetToVLAN+' => '',
	'Class:lnkSubnetToVLAN/Attribute:subnet_id' => 'Sub-rede',
	'Class:lnkSubnetToVLAN/Attribute:subnet_id+' => '',
	'Class:lnkSubnetToVLAN/Attribute:subnet_ip' => 'IP sub-rede',
	'Class:lnkSubnetToVLAN/Attribute:subnet_ip+' => '',
	'Class:lnkSubnetToVLAN/Attribute:subnet_name' => 'Nome sub-rede',
	'Class:lnkSubnetToVLAN/Attribute:subnet_name+' => '',
	'Class:lnkSubnetToVLAN/Attribute:vlan_id' => 'VLAN',
	'Class:lnkSubnetToVLAN/Attribute:vlan_id+' => '',
	'Class:lnkSubnetToVLAN/Attribute:vlan_tag' => 'Nome VLAN',
	'Class:lnkSubnetToVLAN/Attribute:vlan_tag+' => '',
));

//
// Class: NetworkInterface
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NetworkInterface' => 'Placa de rede',
	'Class:NetworkInterface+' => '',
	'Class:NetworkInterface/Attribute:name' => 'Nome',
	'Class:NetworkInterface/Attribute:name+' => '',
	'Class:NetworkInterface/Attribute:finalclass' => 'Tipo',
	'Class:NetworkInterface/Attribute:finalclass+' => '',
));

//
// Class: IPInterface
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPInterface' => 'Endere??o IP',
	'Class:IPInterface+' => '',
	'Class:IPInterface/Attribute:ipaddress' => 'Endere??o IP',
	'Class:IPInterface/Attribute:ipaddress+' => '',


	'Class:IPInterface/Attribute:macaddress' => 'Endere??o MAC',
	'Class:IPInterface/Attribute:macaddress+' => '',
	'Class:IPInterface/Attribute:comment' => 'Coment??rio',
	'Class:IPInterface/Attribute:coment+' => '',
	'Class:IPInterface/Attribute:ipgateway' => 'Gateway',
	'Class:IPInterface/Attribute:ipgateway+' => '',
	'Class:IPInterface/Attribute:ipmask' => 'M??scara de rede',
	'Class:IPInterface/Attribute:ipmask+' => '',
	'Class:IPInterface/Attribute:speed' => 'Velocidade',
	'Class:IPInterface/Attribute:speed+' => '',
));

//
// Class: PhysicalInterface
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PhysicalInterface' => 'Placa f??sica',
	'Class:PhysicalInterface+' => '',
	'Class:PhysicalInterface/Attribute:connectableci_id' => 'Dispositivo',
	'Class:PhysicalInterface/Attribute:connectableci_id+' => '',
	'Class:PhysicalInterface/Attribute:connectableci_name' => 'Nome dispositivo',
	'Class:PhysicalInterface/Attribute:connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:vlans_list' => 'VLANs',
	'Class:PhysicalInterface/Attribute:vlans_list+' => '',
));

//
// Class: lnkPhysicalInterfaceToVLAN
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkPhysicalInterfaceToVLAN' => 'Link Interfaces f??sicas / VLAN',
	'Class:lnkPhysicalInterfaceToVLAN+' => '',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_id' => 'Interface f??sica',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_id+' => '',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_name' => 'Nome interface f??sica',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_name+' => '',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_device_id' => 'Dispositivo',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_device_id+' => '',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_device_name' => 'Nome dispositivo',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:physicalinterface_device_name+' => '',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:vlan_id' => 'VLAN',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:vlan_id+' => '',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:vlan_tag' => 'Nome VLAN',
	'Class:lnkPhysicalInterfaceToVLAN/Attribute:vlan_tag+' => '',
));


//
// Class: LogicalInterface
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:LogicalInterface' => 'Placa l??gica',
	'Class:LogicalInterface+' => '',
	'Class:LogicalInterface/Attribute:virtualmachine_id' => 'M??quina virtual',
	'Class:LogicalInterface/Attribute:virtualmachine_id+' => '',
	'Class:LogicalInterface/Attribute:virtualmachine_name' => 'Nome m??quina virtual',
	'Class:LogicalInterface/Attribute:virtualmachine_name+' => '',
));

//
// Class: FiberChannelInterface
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:FiberChannelInterface' => 'Placa Fiber Channel',
	'Class:FiberChannelInterface+' => '',
	'Class:FiberChannelInterface/Attribute:speed' => 'Velocidade',
	'Class:FiberChannelInterface/Attribute:speed+' => '',
	'Class:FiberChannelInterface/Attribute:topology' => 'Topologia',
	'Class:FiberChannelInterface/Attribute:topology+' => '',
	'Class:FiberChannelInterface/Attribute:wwn' => 'WWN',
	'Class:FiberChannelInterface/Attribute:wwn+' => '',
	'Class:FiberChannelInterface/Attribute:datacenterdevice_id' => 'Dispositivo',
	'Class:FiberChannelInterface/Attribute:datacenterdevice_id+' => '',
	'Class:FiberChannelInterface/Attribute:datacenterdevice_name' => 'Nome dispositivo',
	'Class:FiberChannelInterface/Attribute:datacenterdevice_name+' => '',
));

//
// Class: lnkConnectableCIToNetworkDevice
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkConnectableCIToNetworkDevice' => 'Link ConnectableCI / NetworkDevice',
	'Class:lnkConnectableCIToNetworkDevice+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:networkdevice_id' => 'Dispositivo rede',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:networkdevice_id+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:networkdevice_name' => 'Nome dispositivo rede',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:networkdevice_name+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connectableci_id' => 'Dispositivo conectado',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connectableci_id+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connectableci_name' => 'Nome dispositivo conectado',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connectableci_name+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:network_port' => 'Porta de rede',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:network_port+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:device_port' => 'Porta dispositivo',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:device_port+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connection_type' => 'Tipo conex??o',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connection_type+' => '',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connection_type/Value:downlink' => 'Link down',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connection_type/Value:downlink+' => 'Link down',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connection_type/Value:uplink' => 'Link up',
	'Class:lnkConnectableCIToNetworkDevice/Attribute:connection_type/Value:uplink+' => 'Link up',
));

//
// Class: lnkApplicationSolutionToFunctionalCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkApplicationSolutionToFunctionalCI' => 'Link ApplicationSolution / CI',
	'Class:lnkApplicationSolutionToFunctionalCI+' => '',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:applicationsolution_id' => 'Solu????o aplica????o',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:applicationsolution_id+' => '',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:applicationsolution_name' => 'Nome solu????o aplica????o',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:applicationsolution_name+' => '',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:functionalci_id' => 'CIs',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:functionalci_id+' => '',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:functionalci_name' => 'Nome CI',
	'Class:lnkApplicationSolutionToFunctionalCI/Attribute:functionalci_name+' => '',
));

//
// Class: lnkApplicationSolutionToBusinessProcess
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkApplicationSolutionToBusinessProcess' => 'Link ApplicationSolution / BusinessProcess',
	'Class:lnkApplicationSolutionToBusinessProcess+' => '',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:businessprocess_id' => 'Processos de neg??cio',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:businessprocess_id+' => '',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:businessprocess_name' => 'Nome processos de neg??cio',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:businessprocess_name+' => '',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:applicationsolution_id' => 'Solu????o aplica????o',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:applicationsolution_id+' => '',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:applicationsolution_name' => 'Nome solu????o aplica????o',
	'Class:lnkApplicationSolutionToBusinessProcess/Attribute:applicationsolution_name+' => '',
));

//
// Class: Group
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Group' => 'Grupo',
	'Class:Group+' => '',
	'Class:Group/Attribute:name' => 'Nome',
	'Class:Group/Attribute:name+' => '',
	'Class:Group/Attribute:status' => 'Status',
	'Class:Group/Attribute:status+' => '',
	'Class:Group/Attribute:status/Value:implementation' => 'Implementa????o',
	'Class:Group/Attribute:status/Value:implementation+' => 'Implementa????o',
	'Class:Group/Attribute:status/Value:obsolete' => 'Obsoleto',
	'Class:Group/Attribute:status/Value:obsolete+' => 'Obsoleto',
	'Class:Group/Attribute:status/Value:production' => 'Produ????o',
	'Class:Group/Attribute:status/Value:production+' => 'Produ????o',
	'Class:Group/Attribute:org_id' => 'Organiza????o',
	'Class:Group/Attribute:org_id+' => '',
	'Class:Group/Attribute:owner_name' => 'Nome',
	'Class:Group/Attribute:owner_name+' => 'Nome comum',
	'Class:Group/Attribute:description' => 'Descri????o',
	'Class:Group/Attribute:description+' => '',
	'Class:Group/Attribute:type' => 'Tipo',
	'Class:Group/Attribute:type+' => '',
	'Class:Group/Attribute:parent_id' => 'Grupo principal',

	'Class:Group/Attribute:parent_id+' => '',
	'Class:Group/Attribute:parent_name' => 'Nome',
	'Class:Group/Attribute:parent_name+' => '',
	'Class:Group/Attribute:ci_list' => 'CIs ligados',
	'Class:Group/Attribute:ci_list+' => 'Todos os itens de configura????o associada a esse grupo',
	'Class:Group/Attribute:parent_id_friendlyname' => 'Grupo principal',
	'Class:Group/Attribute:parent_id_friendlyname+' => '',
));

//
// Class: lnkGroupToCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkGroupToCI' => 'Link Grupo / CI',
	'Class:lnkGroupToCI+' => '',
	'Class:lnkGroupToCI/Attribute:group_id' => 'Grupo',
	'Class:lnkGroupToCI/Attribute:group_id+' => '',
	'Class:lnkGroupToCI/Attribute:group_name' => 'Nome',
	'Class:lnkGroupToCI/Attribute:group_name+' => '',
	'Class:lnkGroupToCI/Attribute:ci_id' => 'CI',
	'Class:lnkGroupToCI/Attribute:ci_id+' => '',
	'Class:lnkGroupToCI/Attribute:ci_name' => 'Nome',
	'Class:lnkGroupToCI/Attribute:ci_name+' => '',
	'Class:lnkGroupToCI/Attribute:reason' => 'Raz??o',
	'Class:lnkGroupToCI/Attribute:reason+' => '',
));

// Add translation for Fieldsets

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Server:baseinfo' => 'Informa????es gerais',
	'Server:Date' => 'Data',
	'Server:moreinfo' => 'Mais informa????es',
	'Server:otherinfo' => 'Outras informa????es',
	'Server:power' => 'Fonte de alimenta????o',
	'Class:Subnet/Tab:IPUsage' => 'IP usado',
	'Class:Subnet/Tab:IPUsage-explain' => 'Placas de rede contendo IP na faixa: <em>%1$s</em> para <em>%2$s</em>',
	'Class:Subnet/Tab:FreeIPs' => 'IPs livres',
	'Class:Subnet/Tab:FreeIPs-count' => 'IPs livres: %1$s',
	'Class:Subnet/Tab:FreeIPs-explain' => 'Aqui uma faixa de 10 endere??os IPs livres',
	'Class:Document:PreviewTab' => 'Visualiza????o',
));


//
// Class: lnkDocumentToFunctionalCI
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkDocumentToFunctionalCI' => 'Link Documento / CI',
	'Class:lnkDocumentToFunctionalCI+' => '',
	'Class:lnkDocumentToFunctionalCI/Attribute:functionalci_id' => 'CIs',
	'Class:lnkDocumentToFunctionalCI/Attribute:functionalci_id+' => '',
	'Class:lnkDocumentToFunctionalCI/Attribute:functionalci_name' => 'Nome CI',
	'Class:lnkDocumentToFunctionalCI/Attribute:functionalci_name+' => '',
	'Class:lnkDocumentToFunctionalCI/Attribute:document_id' => 'Documento',
	'Class:lnkDocumentToFunctionalCI/Attribute:document_id+' => '',
	'Class:lnkDocumentToFunctionalCI/Attribute:document_name' => 'Nome documento',
	'Class:lnkDocumentToFunctionalCI/Attribute:document_name+' => '',
));

//
// Application Menu
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Menu:Application' => 'Applica????es',
	'Menu:Application+' => 'Todas aplica????es',
	'Menu:DBServer' => 'Servi??os Banco de Dados',
	'Menu:DBServer+' => 'Servi??os Banco de Dados',
	'Menu:BusinessProcess' => 'Processos de neg??cios',
	'Menu:BusinessProcess+' => 'Todos processos de neg??cios',
	'Menu:ApplicationSolution' => 'Solu????o aplica????o',
	'Menu:ApplicationSolution+' => 'Todas solu????es aplica????es',
	'Menu:ConfigManagementSoftware' => 'Gerenciamento aplica????es',
	'Menu:Licence' => 'Licen??as',
	'Menu:Licence+' => 'Todoas licen??as',
	'Menu:Patch' => 'Patches',
	'Menu:Patch+' => 'Todos patches',
	'Menu:ApplicationInstance' => 'Software instalados',
	'Menu:ApplicationInstance+' => 'Servi??os aplica????es e Banco de dados',
	'Menu:ConfigManagementHardware' => 'Gerenciamento Infra-estrutura',
	'Menu:Subnet' => 'Sub-redes',
	'Menu:Subnet+' => 'Todas sub-redes',
	'Menu:NetworkDevice' => 'Dispositivos rede',
	'Menu:NetworkDevice+' => 'Todos dispositivos rede',
	'Menu:Server' => 'Servidores',
	'Menu:Server+' => 'Todos servidores',
	'Menu:Printer' => 'Impressoras',
	'Menu:Printer+' => 'Todas impressoras',
	'Menu:MobilePhone' => 'Telefone celulares',
	'Menu:MobilePhone+' => 'Todos telefone celulares',
	'Menu:PC' => 'Esta????o de trabalho',
	'Menu:PC+' => 'Todas esta????o de trabalho',
	'Menu:NewCI' => 'Novo CI',
	'Menu:NewCI+' => 'Novo CI',
	'Menu:SearchCIs' => 'Pesquisar por CIs',
	'Menu:SearchCIs+' => 'Pesquisar por CIs',
	'Menu:ConfigManagement:Devices' => 'Dispositivos',
	'Menu:ConfigManagement:AllDevices' => 'Infra-estrutura',
	'Menu:ConfigManagement:virtualization' => 'Virtualiza????o',
	'Menu:ConfigManagement:EndUsers' => 'Dispositivos usu??rio final',
	'Menu:ConfigManagement:SWAndApps' => 'Software e aplica????es',
	'Menu:ConfigManagement:Misc' => 'Diversos',
	'Menu:Group' => 'Grupos de CIs',
	'Menu:Group+' => 'Grupos de CIs',
	'Menu:OSVersion' => 'Vers??o OS',
	'Menu:OSVersion+' => '',
	'Menu:Software' => 'Cat??logo software',
	'Menu:Software+' => 'Cat??logo software',
));
?>
