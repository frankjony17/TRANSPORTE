
Ext.define('CDT.store.transporte.especialista.ModeloStore', {
    extend: 'Ext.data.Store',

    fields: ['id', 'nombre', 'descripcion'],
    autoLoad: true,
    sorters: 'nombre',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/modelo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
