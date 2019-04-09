
Ext.define('CDT.view.transporte.especialista.situacion_operativa.SituacionOperativaGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'situacionoperativaGrid',

    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,

    initComponent: function()
    {
        var me = this; // Ambito del componente
        // Store
        me.store = Ext.create('CDT.store.transporte.especialista.SituacionOperativaStore');
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
                maxLength: 75,
                allowBlank: false
            }
        }, {
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
            tooltip: 'Adicionar situacion operativa',
            iconCls: 'fa fa-plus'
        },{
            text: 'Eliminar',
            tooltip: 'Eliminar situacion operativa',
            iconCls: 'fa fa-times'
        },'->',{
            tooltip: 'Ayuda acerca de situacion operativa',
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

