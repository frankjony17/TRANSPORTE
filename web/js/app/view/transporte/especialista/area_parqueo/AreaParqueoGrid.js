
Ext.define('CDT.view.transporte.especialista.area_parqueo.AreaParqueoGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'areaparqueoGrid',

    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,

    initComponent: function()
    {
        var me = this; // Ambito del componente.
        // Store 
        me.store = Ext.create('CDT.store.transporte.especialista.AreaParqueoStore');
        // Modelo de columna      
        me.columns = [{
            xtype : 'rownumberer',
            text  : 'No',
            width : 39,
            align : 'center'
        }, {
            text: 'Id',
            dataIndex: 'id',
            width: 35,
            hidden: true
        }, {
            text: 'Nombre',
            dataIndex: 'nombre',
            flex: 3,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\ \áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 74,
                allowBlank: false
            }
        }, {
            text: 'Teléfonos',
            dataIndex: 'telefonos',
            flex: 2,
            editor: {
                xtype: 'textfield',
                maskRe: /[0-9\-\ \,]/,
                regex: /[0-9]/,
                maxLength: 43,
                allowBlank: false
            }
        }, {
            text: 'Dirección',
            dataIndex: 'direccion',
            flex: 4,
            editor: {
                xtype: 'textfield',
                maskRe: /[0-9\/\ \,\aA-zZ\.\#\áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 118,
                allowBlank: false
            }
        },{
            text: 'Tipo',
            dataIndex: 'areaParqueoTipo',
            flex: 2,
            editor: {
                xtype: 'combobox',
                store: Ext.create('CDT.store.transporte.especialista.AreaParqueoTipoStore'),
                queryMode: 'local',
                displayField: 'tipo',
                valueField: 'id',
                allowBlank: false
            }
        },{
            text: 'Unidad Organizativa',
            dataIndex: 'unidadOrganizativa',
            flex: 2
        }];
        // Articulos de topbar: barra superior    
        me.tbar = [{
            text: 'Adicionar',
            tooltip: 'Adicionar área de parqueo',
            iconCls: 'fa fa-plus'
        },{
            text: 'Eliminar',
            tooltip: 'Eliminar área de parqueo',
            iconCls: 'fa fa-times'
        },'->',{
            tooltip: 'Ayuda acerca de área de parqueo',
            iconCls: 'fa fa-question'
        }];
        // Plugins para actualizar...
        me.plugins = Ext.create('Ext.grid.plugin.RowEditing', {
            saveBtnText: 'Editar',
            cancelBtnText: 'Cancelar'
        });
        // Carga nuestra configuaración y se la pasa al componente del que heredamos.  
        me.callParent(arguments);
    }
});