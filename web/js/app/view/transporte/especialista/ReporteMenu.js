
Ext.define('CDT.view.transporte.especialista.ReporteMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'reporteMenu',

    width: 250,
    closeAction : 'destroy',

    items: [{
        text: 'Incidencias del transporte'
        //iconCls: 'fa fa-file-text-o'
//        id: 'parqueo-eventual-id'
    },{
        text: 'Control del transporte'
        //iconCls: 'fa fa-file-text-o'
//        id: 'parqueo-eventual-id'
    },{
        text: 'Situación operativa de los vehículos'
        //iconCls: 'fa fa-file-text-o'
//        id: 'parqueo-eventual-id'
    },{
        text: 'Autorizos de parqueo permanente'
//        iconCls: 'circulacion-eventual',
//        id: 'circulacion-eventual-id'
    },{
        text: 'Autorizos de parqueo eventual'
//        iconCls: 'circulacion-eventual',
//        id: 'circulacion-eventual-id'
    },{
        text: 'Autorizos de circulación eventual'
//        iconCls: 'circulacion-eventual',
//        id: 'circulacion-eventual-id'
    }]
});