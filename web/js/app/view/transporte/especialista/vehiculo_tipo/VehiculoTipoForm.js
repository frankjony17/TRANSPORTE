
Ext.define('CDT.view.transporte.especialista.vehiculo_tipo.VehiculoTipoForm', {
    extend: 'Ext.window.Window',
    xtype : 'vehiculotipoForm',

    title: 'Adicionar tipo de vehículo',
    iconCls: 'fa fa-truck',
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
                fieldLabel: 'Nombre',
                name: 'Nombre',
                emptyText: 'Tipo de vehículo',
                anchor: '100%',
                maskRe: /[aA-zZ\ \áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 43,
                allowBlank: false
            },{
                xtype: 'textarea',
                fieldLabel: 'Descripción',
                name: 'Descripcion',
                emptyText: 'Descripción',
                anchor: '100%',
                grow: true,
                maskRe: /[aA-zZ\áéíóúñÁÉÍÓÚÑ\ \.\,]/,
                regex: /[aA-zZ]/,
                maxLength: 118
            }]
        }];
        me.buttons = [{
            text: 'Salvar',
            iconCls: 'fa fa-check-circle-o',
            action: 'save'
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
