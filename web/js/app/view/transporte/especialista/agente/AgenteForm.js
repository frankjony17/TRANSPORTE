
Ext.define('CDT.view.transporte.especialista.agente.AgenteForm', {
    extend: 'Ext.window.Window',
    xtype: 'agenteForm',

    title: 'Adicionar agente',
    iconCls: 'fa fa-male',
    layout: 'fit',
    autoShow: true,
    buttonAlign: 'center',
    width: 575,
    resizable: false,
    modal: true,

    initComponent: function ()
    {
        var me = this;
        
        me.items = [
        {
            xtype: 'form',

            padding: '10 10 10 10',
            border: false,
            style: 'background-color: #fff;',

            fieldDefaults: {
                labelAlign: 'top'
            },
            items: [{
                xtype: 'textfield',
                fieldLabel: 'Nombre y Apellidos',
                name: 'NombreApellidos',
                emptyText: 'Nombre y apellidos del agente',
                anchor: '100%',
                maskRe: /[aA-zZ\ \áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 43,
                allowBlank: false
            }]
        }];
        me.buttons = [{
            text: 'Salvar',
            iconCls: 'fa fa-check-circle-o'
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-ban',
            listeners: {
                click: function(){ 
                    me.close();
                }
            }
        }];
        me.callParent(arguments);
    }
});