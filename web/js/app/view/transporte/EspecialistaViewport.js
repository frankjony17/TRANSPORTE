
Ext.define('CDT.view.transporte.EspecialistaViewport', {
    extend: 'Ext.container.Viewport',
    
    layout : {
        type    : 'border',
        padding : 1
    },
    id: 'view-viewport-id',
    
    initComponent: function()
    {
        var me = this; Ext.QuickTips.init();
        
        me.items = [
        {
            region: 'north',
            xtype: 'container',
            border: false,
            height: 57,
            style: {
                backgroundColor: '#157fcc',
            },
            layout: {
                type: 'hbox',
                align: 'center'
            },
            items:[{
                xtype: 'buttongroup',
                width: 175,
                style: {
                    "margin-left": '5px'
                },
                items: [{
                    text: '<b>Nomencladores</b>',
                    tooltip: 'Gestionar los principales nomencladores de Transporte',
                    xtype: 'button',
                    menu: Ext.create('CDT.view.transporte.especialista.NomencladorMenu'),
                    iconCls: 'fa fa-pencil-square-o'
                }]
            },{
                xtype: 'tbspacer',
                width: 6
            },{
                xtype: 'buttongroup',
                width: 130,
                items: [{
                    text: '<b>Listados</b>',
                    //tooltip: 'Acciones de transporte tales como:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>1-Control de Horario de Parqueo.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2-Parqueo Eventual.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-Circulación Eventual.</b>',
                    xtype: 'button',
                    menu: Ext.create('CDT.view.transporte.especialista.ListadosMenu'),
                    iconCls: 'fa fa-list-ul'
                }]
            },{
                xtype: 'tbfill'
            },{
                xtype: 'buttongroup',
                items: [{
                    xtype: 'button',
                    tooltip: 'Inicio',
                    iconCls: 'fa fa-home',
                    id: 'cerrar'
                }]
            },{
                xtype: 'tbspacer',
                width: 6
            },{
                xtype: 'buttongroup',
                style: {
                    "margin-right": '5px'
                },
                items: [{
                    text: '<b>Opciones</b>',
                    xtype: 'button',
                    menu: Ext.create('CDT.view.transporte.especialista.OpcionesMenu'),
                    iconCls: 'fa fa-gear'
                },{
                    text: '<b>Salir</b>',
                    tooltip: 'Salir del sistema',
                    xtype: 'button',
                    iconCls: 'fa fa-power-off',
                    id: 'transporte-logout'
                }]
            }]
        },{
            region: 'center',
            xtype: 'panel',
            border: true,
            bodyStyle: 'background-image:url(../../images/portal/square.gif);',
            id: 'center-panel-id'
        },{
            region: 'south',
            id: 'south-panel-id',
            items: Ext.create('CDT.view.StatusBarPanel')
        }];
       // Carga nuestra configuaración y se la pasa al componente del que heredamos. 
        me.callParent(arguments);
    }
});
