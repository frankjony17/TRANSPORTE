
Ext.define('CDT.view.AplicacionesMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'appMenu',

    width: 248,
    closeAction : 'destroy',

    initComponent: function ()
    {
        var me = this, menu = [];
        
        Ext.Array.each(aplicaciones, function(item)
        {
            if (item.id !== me.appId)
            {
                menu.push(item); 
            }
        });
        me.items = menu;
        
        me.listeners = {
            click: function (menu, item)
            {
                switch (item.id) {
                    case 'admin-app-id':
                        location.href = entorno+'/admin';
                        break;
                    // Transporte
                    case 'transporte-app-especialista-id':
                        location.href = entorno+'/transporte/especialista';
                        break;   
                    case 'transporte-app-planificador-id':
                        location.href = entorno+'/transporte/planificador';
                        break;
                    case 'transporte-app-tecnico-id':
                        location.href = entorno+'/transporte/tecnico';
                        break;
                }
            }
        };
        me.callParent(arguments);
    }
});