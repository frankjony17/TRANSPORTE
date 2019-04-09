
Ext.define('CDT.store.transporte.especialista.SituacionOperativaStore', {
    extend: 'Ext.data.Store',

    fields: ['id', 'nombre', 'descripcion'],
    autoLoad: true,
    sorters: 'nombre',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/situacion_operativa/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});

