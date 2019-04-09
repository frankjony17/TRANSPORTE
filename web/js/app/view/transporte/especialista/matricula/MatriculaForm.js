
Ext.define('CDT.view.transporte.especialista.matricula.MatriculaForm', {
    extend: 'Ext.window.Window',
    xtype: 'matriculaForm',

    title: 'Editar Id',
    iconCls: 'fa fa-pencil-square',
    layout: 'fit',
    buttonAlign: 'center',
    width: 350,
    closable: false,
    resizable: false,
    modal: true,
    headerPosition: 'bottom',
    
    initComponent: function ()
    {
        var me = this;
        
        me.items = [{
            xtype: 'form',
            padding: '10 10 10 10',
            border: false,
            style: 'background-color: #fff;',
            fieldDefaults: {
                labelAlign: 'top'
            },
            items: [
            {
                xtype: 'container',
                layout: 'hbox',
                items: [{
                    xtype: 'container',
                    flex: 1,
                    border: false,
                    layout: 'anchor',
                    defaultType: 'textfield',
                    items: [{
                        fieldLabel: 'ID (App-Habana)',
                        name: 'id',
                        emptyText: 'ID (App-Habana)',
                        anchor: '100%',
                        maskRe: /[0-9]/,
                        regex: /[0-9]/,
                        maxLength: 10,
                        minLength: 5,
                        allowBlank : false
                    }]
                }]
            }]
        }];
        me.tools = [{
            xtype: 'button',
            text: 'Salvar',
            iconCls: 'fa fa-check-circle-o'
        },{
            xtype: 'tbspacer', width: 5
        },{
            xtype: 'button',
            text: 'Cancelar',
            iconCls: 'fa fa-ban',
            listeners: {
                click: function () { 
                    me.close();
                }
            }
        }];
        me.callParent(arguments);
    }
});