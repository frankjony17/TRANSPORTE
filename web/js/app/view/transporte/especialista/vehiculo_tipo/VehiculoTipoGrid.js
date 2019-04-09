
Ext.define('CDT.view.transporte.especialista.vehiculo_tipo.VehiculoTipoGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'vehiculotipoGrid',

    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,

    initComponent: function()
    {
        var me = this; // Ambito del componente.
        // Store 
        me.store = Ext.create('CDT.store.transporte.especialista.VehiculoTipoStore');
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
            flex: 1,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\ \áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 43,
                allowBlank: false
            }
        },{
            text: 'Descripción',
            dataIndex: 'descripcion',
            flex: 3,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\áéíóúñÁÉÍÓÚÑ\ \.\,]/,
                regex: /[aA-zZ]/,
                maxLength: 118
            }
        }];
        // Articulos de topbar: barra superior    
        me.tbar = [{
            text: 'Adicionar',
            tooltip: 'Adicionar tipo de vehículo',
            iconCls: 'fa fa-plus'
        },{
            text: 'Eliminar',
            tooltip: 'Eliminar tipo de vehículo',
            iconCls: 'fa fa-times'
        },'->',{
            tooltip: 'Ayuda acerca de tipo de vehículo',
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