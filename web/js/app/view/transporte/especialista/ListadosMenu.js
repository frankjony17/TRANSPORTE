
Ext.define('CDT.view.transporte.especialista.ListadosMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'eventualMenu',

    width: 250,
    closeAction : 'destroy',

    items: [{
        text: 'Vehículos que están trabajando',
        //tooltip: 'yyyyyyyyyy.',
        //iconCls: 'menu-parqueo',
        id: 'menu-ls-id'
    },{
        text: 'Vehículos que han incidido',
        //tooltip: 'ffffff.',
        //iconCls: 'parqueo-eventual',
        id: 'lss-id'
    },{
        text: 'Circulaciones eventuales del día',
        //tooltip: 'gggggggg.',
        //iconCls: 'circulacion-eventual',
        id: 'lsss-id'
    }]
});
