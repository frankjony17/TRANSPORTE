
Ext.define('CDT.view.portal.Viewport', {
    extend: 'Ext.container.Viewport',
    xtype : 'viewportPortal',
    
    layout: 'border',
    id: 'portal-viewport-cdt',
    
    initComponent: function()
    {
        var me = this;
        
        me.items = [
        {
            region: 'north',
            xtype: 'container',
            border: false,
            height: 45,
            
            layout: {
                type: 'hbox',
                align: 'middle'
            },
            id: 'portal-header',
            
            items:[{
                xtype: 'component',
                id: 'portal-header-title',
                html: 'TRANSPORTE-ETECSA-CDT',
                flex: 1
            }]
        },
            // REGIÓN CENTRAL --------------------------------------------------
        {
            region: 'center',
            xtype : 'panel',
            bodyStyle: 'background-image:url(../../images/portal/square.gif);',
            border: false,
            
            layout: {
                type: 'table',
                columns: 3,
                tdAttrs: { style: 'padding: 10px;' }
            },
            defaults: {
                xtype: 'panel',
                width: 250,
                height: 200,
                bodyPadding: 10
            },
            style: 'align: center;',
            items: Ext.create('CDT.view.portal.LoginPanel')
        }];
       // Carga nuestra configuaración y se la pasa al componente del que heredamos. 
        me.callParent(arguments);
    }
});