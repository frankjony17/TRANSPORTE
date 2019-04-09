

Ext.define('CDT.view.transporte.especialista.chofer_vehiculo.ChoferVehiculoForm', {
    extend: 'Ext.window.Window',
    xtype: 'chofervehiculoForm',

    title: 'Adicionar chofer-vehículo',
    // iconCls: 'fa fa-newspaper-o',
    layout: 'fit',
    buttonAlign: 'center',
    width: 700,
    resizable: false,
    modal: true,
    y: 54,
    
    initComponent: function ()
    {
        var me = this;
        
        me.choferStore = Ext.create('CDT.store.transporte.especialista.ChoferStore');
        me.vehiculoStore = Ext.create('CDT.store.transporte.especialista.VehiculoStore');

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
                xtype: 'fieldset',
                items: [{
                    xtype: 'fieldset',
                    collapsible: true,
                    collapsed: true,
                    title: 'Filtrar los choferes por área:',
                    layout: 'hbox',
                    id: 'chofer-fieldset-area',
                    items: [{
                        xtype: 'container',
                        flex: 1,
                        border: false,
                        layout: 'anchor',
                        items: [{
                            xtype: 'combobox',
                            emptyText: 'Área del Chofer',
                            store: Ext.create('CDT.store.admin.AreaStore'),
                            queryMode: 'local',
                            displayField: 'nombre',
                            anchor: '99%',
                            editable: false
                        }]
                    },{
                        xtype: 'button',
                        iconCls: 'fa fa-trash',
                        anchor: '100%',
                        disabled: true
                    }]
                },{
                    xtype: 'fieldset',
                    layout: 'hbox',
                    items: [{
                        xtype: 'container',
                        flex: 3,
                        border: false,
                        layout: 'anchor',
                        items: [{
                            xtype: 'combobox',
                            fieldLabel: 'Chofer',
                            emptyText: 'Nombre y Apellidos',
                            name: 'chofer',
                            store: me.choferStore,
                            queryMode: 'local',
                            displayField: 'trabajador',
                            valueField: 'id',
                            typeAhead: true,
                            selectOnFocus: true,
                            anchor: '98%',
                            editable: false,
                            allowBlank: false
                        }]
                    }]
                }]
            },{
                xtype: 'fieldset',
                items: [{
                    xtype: 'fieldset',
                    collapsible: true,
                    collapsed: true,
                    title: 'Filtrar los vehículos por área:',
                    layout: 'hbox',
                    id: 'vehiculo-fieldset-area',
                    items: [{
                        xtype: 'container',
                        flex: 1,
                        border: false,
                        layout: 'anchor',
                        items: [{
                            xtype: 'combobox',
                            emptyText: 'Área del Vehículo',
                            store: Ext.create('CDT.store.admin.AreaStore'),
                            queryMode: 'local',
                            displayField: 'nombre',
                            anchor: '99%',
                            editable: false
                        }]
                    },{
                        xtype: 'button',
                        iconCls: 'fa fa-trash-o',
                        anchor: '100%',
                        disabled: true
                    }]
                },{
                    xtype: 'fieldset',
                    layout: 'hbox',
                    items: [{
                        xtype: 'container',
                        flex: 3,
                        border: false,
                        layout: 'anchor',
                        items: [{
                            xtype: 'combobox',
                            fieldLabel: 'Vehículo',
                            emptyText: 'Matrícula',
                            name: 'vehiculo',
                            store: me.vehiculoStore,
                            queryMode: 'local',
                            displayField: 'chapa',
                            valueField: 'id',
                            typeAhead: true,
                            selectOnFocus: true,
                            anchor: '98%',
                            editable: false,
                            allowBlank: false
                        }]
                    }]
                }]
            },{
                xtype: 'fieldset',
                collapsible: true,
                title: 'Otro:',
                layout: 'hbox',
                items: [{
                    xtype: 'container',
                    flex: 1,
                    border: false,
                    layout: 'anchor',
                    items: [{
                        xtype: 'combobox',   
                        fieldLabel: 'Permanente',
                        name: 'permanente',
                        store: ['SI', 'NO'],
                        queryMode: 'local',
                        editable: false,
                        emptyText: 'Permanente',
                        anchor: '100%'
                    }]
                }]
            }]
        }];
        me.buttons = [{
            text: me.btnText,
            iconCls: me.btnIconCls,
            action: me.btnAction
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-ban',
            listeners: {
                click: function() {
                    me.close();
                }
            }
        }];
        me.callParent(arguments);
    }
});
