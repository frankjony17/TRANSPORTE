
Ext.define('CDT.view.transporte.especialista.charts.TransportePanel', {
    extend: 'Ext.panel.Panel',
    
    layout: 'fit',
    width: '100%',
    height: 200,
    border: false,
    
    initComponent: function()
    {
        var me = this;
        
        me.items = Ext.create('CDT.view.transporte.especialista.charts.TransporteChart');

        me.callParent(arguments);
    }
});