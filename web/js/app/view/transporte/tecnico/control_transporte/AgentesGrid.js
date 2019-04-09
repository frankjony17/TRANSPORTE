
Ext.define('SCS.view.jefedisenno.consejotecnico.IntervencionesGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'consejo-tecnico-intervenciones-grid',

    width: '100%',
    height: 250,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',

    initComponent: function () {
        var me = this;
        this.store = Ext.create('SCS.store.consejotecnico.IntervencionStore');
        me.storePersona = Ext.create('SCS.store.PersonaStore');
        this.plugins = new Ext.grid.plugin.CellEditing({
            clicksToEdit: 2
        });
        this.stateEvents = 'actioncolumnClick';
        this.columns = [{
            xtype: 'rownumberer',
            text: 'No',
            width: 45,
            align: 'center'
        },{
            text: 'Id',
            dataIndex: 'id',
            width: 45,
            hidden: true
        },{
            text: 'Nombres',
            dataIndex: 'persona',
            flex: 2,
            hidden: false
        },{
            text: 'Planteamientos',
            dataIndex: 'planteamiento',
            flex: 7,
            editor: {
                xtype: 'textfield',
                maxLength: 250
            }
        },{
            xtype: 'actioncolumn', width: 25,
            items: [{
                iconCls: 'delete-row',
                tooltip: 'Elimanar registro.',
                handler: function(grid, rowIndex, colIndex){
                    me.fireEvent('actioncolumnClick', [grid, rowIndex]);
                }
            }]
        },{
            text: 'persona_id',
            dataIndex: 'persona_id',
            flex: 7,
            hidden: true
        }];
        this.tbar = [{
            xtype: 'combobox',
            emptyText: 'Filtrar por: Tipo de Persona',
            store: Ext.create('SCS.store.PersonaTipoStore'),
            queryMode: 'local',
            displayField: 'nombre',
            valueField: 'id',
            margin: '0 5 5 0',
            flex: 2,
            editable: false,
            listeners: {
                select: function (combo) {
                    me.storePersona.clearFilter();
                    if (combo.value) {
                        me.storePersona.filter({
                            property: 'persona_tipo_id',
                            value: combo.value,
                            anyMatch: true
                        });
                    }
                    me.down('[displayField=nombre_apellidos]').setValue();
                }
            }
        },{
            xtype: 'combobox',
            emptyText: 'Seleccione una Persona',
            store: me.storePersona,
            queryMode: 'local',
            displayField: 'nombre_apellidos',
            valueField: 'id',
            flex: 4,
            disabled: true,
            editable: false,
            id: 'combobox-persona-intervencion-form'
        }];
        this.callParent(arguments);
    }
});