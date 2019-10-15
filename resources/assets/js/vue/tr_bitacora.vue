<template>
<div>

    <form-container :titulo="titulo" :head-color="$App.theme.headForm">

        <v-form ref="form" v-model="valido" lazy-validation>

            <v-layout wrap>

                
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.id_bitacora"
        label=" bitacora"
        placeholder="Indique  bitacora"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.co_accion"
        label=" accion"
        placeholder="Indique  accion"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_tabla"
        label=" tabla"
        placeholder="Indique  tabla"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.in_id_tabla"
        label=" id tabla"
        placeholder="Indique  id tabla"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_old_valor"
        label=" old valor"
        placeholder="Indique  old valor"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_new_valor"
        label=" new valor"
        placeholder="Indique  new valor"
    ></v-text-field>
</v-flex>
<v-flex xs12 sm3>
            <v-menu
                ref="picker"
                v-model="picker.fe_accion"
                full-width
                min-width="290px"
                readonly
            >
                <v-text-field
                slot="activator"
                v-model="dates.fe_accion"
                :rules="rules.etapaCo"
                label="Fecha Corresponsal"
                prepend-icon="event"
                readonly
                required
                ></v-text-field>

                <v-date-picker 
                    v-model="form.fe_accion" 
                    locale="es"
                    @input="dates.fe_accion = formatDate( form.fe_accion )"
                ></v-date-picker>

            </v-menu>
</v-flex>

<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.id_usuario"
        label=" usuario"
        placeholder="Indique  usuario"
    ></v-text-field>
</v-flex>

            </v-layout>

     </v-form>

    <template slot="buttons">
        <form-buttons
            @update="update()"
            @store="store()"
            @clear="clear()"
            @cancel="cancel()"
            :btnAccion="btnAccion"
            :valido="valido"
        ></form-buttons>
    </template>

    </form-container>

    <pre v-if="$App.debug">{{ $props }}</pre>

</div>
</template>

<script>
import formHelper from '~/mixins/Appform';
export default {
    mixins: [formHelper],
    data(){
        return{
            tabla: 'tr_bitacora',
            form:{
                {{tableField}}
            },
            listas:{
                //{{foreigTables}}: [{{options}}],
            },
        }
    },
    methods:
    {
        update()
        {
        },
        store()
        {
        }
    }
}
</script>

<style>
</style>