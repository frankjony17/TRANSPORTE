
Ext.define('CDT.view.transporte.tecnico.ReporteMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'reporteMenu',

    width: 250,
    closeAction : 'destroy',

    items: [{
        text: 'Incidencias del transporte',
        iconCls: 'fa fa-mail-reply-all'
//        id: 'parqueo-eventual-id'
    },{
        text: 'Circulaciones eventuales vencidas',
        iconCls: 'fa fa-hourglass-3'
//        id: 'circulacion-eventual-id'
    },{
        text: 'Circulaciones eventuales vencidas',
        iconCls: 'fa fa-hourglass-3'
//        id: 'circulacion-eventual-id'
    }]
});