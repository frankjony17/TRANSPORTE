
Ext.define('CDT.store.transporte.especialista.MarcaStore', {
    extend: 'Ext.data.Store',

    fields: ['id', 'nombre', 'descripcion'],
    autoLoad: true,
    sorters: 'nombre',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/marca/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
