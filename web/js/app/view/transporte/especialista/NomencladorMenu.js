
Ext.define('CDT.view.transporte.especialista.NomencladorMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'nomencladorMenu',

    width: 200,
    closeAction : 'destroy',

    items: [{
        text: 'Chofer',
        iconCls: 'fa fa-user',
        id: 'chofer-id'
    }
    ,
    {
        text: 'Chofer-Vehículo',
        iconCls: 'fa fa-newspaper-o',
        id: 'chofer-vehiculo-id'
    }
    ,"-",{
        text: 'Matrícula',
        iconCls: 'fa fa-barcode',
        id: 'matricula-id'
    },{
        text: 'Vehículo',
        iconCls: 'fa fa-automobile',
        id: 'vehiculo-id'
    },"-",{
        text: 'Área de parqueo',
        iconCls: 'fa fa-flag-checkered',
        id: 'area-parqueo-id'
    },{
        text: 'Situación operativa',
        iconCls: 'fa fa-paste',
        id: 'situacion-operativa-id'
    },"-",{
        text: 'Tipo de vehículo',
        iconCls: 'fa fa-truck',
        id: 'tipo-vehiculo-id'
    },{
        text: 'Modelo',
        iconCls: 'fa fa-hospital-o',
        id: 'modelo-id'
    },{
        text: 'Marca',
        iconCls: 'fa fa-medium',
        id: 'marca-id'
    },"-",{
        text: 'Agente',
        iconCls: 'fa fa-male',
        id: 'agente-id'
    }]
});