
Ext.define('CDT.store.transporte.especialista.VehiculoTipoStore', {
    extend: 'Ext.data.Store',

    fields: ['id', 'nombre', 'descripcion'],
    autoLoad: true,
    sorters: 'nombre',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/vehiculo_tipo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
