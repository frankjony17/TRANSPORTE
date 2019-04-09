
Ext.define('CDT.view.transporte.TecnicoViewport', {
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
                    width: 180,
                    style: {
                        "margin-left": '5px'
                    },
                    items: [
                        {
                            text: '<b>Horario de Parqueo</b>',
                            tooltip: 'Controlar el horario de parqueo de los vehículos.',
                            xtype: 'button',
                            iconCls: 'fa fa-list-alt',
                            id: 'horario-id'
                    }]
                },{
                    xtype: 'tbspacer',
                    width: 6
                },{
                    xtype: 'buttongroup',
                    width: 377,
                    items: [{
                        text: '<b>Autorizo Circulación</b>',
                        //tooltip: 'Acciones de transporte tales como:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>1-Control de Horario de Parqueo.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2-Parqueo Eventual.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3-Circulación Eventual.</b>',
                        xtype: 'button',
                        menu: Ext.create('CDT.view.transporte.tecnico.AutorizoCirculacionMenu'),
                        iconCls: 'fa fa-files-o'
                    },{
                        text: '<b>Autorizo Parqueo</b>',
                        //tooltip: 'Gestionar los principales nomencladores de Transporte.',
                        xtype: 'button',
                        menu: Ext.create('CDT.view.transporte.tecnico.AutorizoParqueoMenu'),
                        iconCls: 'fa fa-clone'
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
                        menu: Ext.create('CDT.view.transporte.tecnico.OpcionesMenu'),
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

