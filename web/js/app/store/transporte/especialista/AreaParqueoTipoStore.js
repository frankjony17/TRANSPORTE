
Ext.define('CDT.store.transporte.especialista.AreaParqueoTipoStore', {
    extend: 'Ext.data.Store',

    fields : ['id', 'tipo', 'descripcion'],
    autoLoad: true,
    sorters: 'tipo',

    proxy : {
        type : 'ajax',
        url: entorno+'/transporte/area_parqueo_tipo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
