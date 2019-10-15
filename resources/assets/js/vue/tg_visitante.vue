<template>
<div>

    <form-container :titulo="titulo" :head-color="$App.theme.headForm">

        <v-form ref="form" v-model="valido" lazy-validation>

            <v-layout wrap>

                
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.id_visitante"
        label=" visitante"
        placeholder="Indique  visitante"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_nombres"
        label=" nombres"
        placeholder="Indique  nombres"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_apellidos"
        label=" apellidos"
        placeholder="Indique  apellidos"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.nu_cedula"
        label=" cedula"
        placeholder="Indique  cedula"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_nacionalidad"
        label=" nacionalidad"
        placeholder="Indique  nacionalidad"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_foto"
        label=" foto"
        placeholder="Indique  foto"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_cod_pais"
        label=" cod pais"
        placeholder="Indique  cod pais"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.tx_telefono"
        label=" telefono"
        placeholder="Indique  telefono"
    ></v-text-field>
</v-flex>
<v-flex xs12 >
    <v-text-field
        :rules="rules.required"
        v-model="form.id_status"
        label=" status"
        placeholder="Indique  status"
    ></v-text-field>
</v-flex>
<v-flex xs12 sm3>
            <v-menu
                ref="picker"
                v-model="picker.fe_creado"
                full-width
                min-width="290px"
                readonly
            >
                <v-text-field
                slot="activator"
                v-model="dates.fe_creado"
                :rules="rules.etapaCo"
                label="Fecha Corresponsal"
                prepend-icon="event"
                readonly
                required
                ></v-text-field>

                <v-date-picker 
                    v-model="form.fe_creado" 
                    locale="es"
                    @input="dates.fe_creado = formatDate( form.fe_creado )"
                ></v-date-picker>

            </v-menu>
</v-flex>

<v-flex xs12 sm3>
            <v-menu
                ref="picker"
                v-model="picker.fe_actualizado"
                full-width
                min-width="290px"
                readonly
            >
                <v-text-field
                slot="activator"
                v-model="dates.fe_actualizado"
                :rules="rules.etapaCo"
                label="Fecha Corresponsal"
                prepend-icon="event"
                readonly
                required
                ></v-text-field>

                <v-date-picker 
                    v-model="form.fe_actualizado" 
                    locale="es"
                    @input="dates.fe_actualizado = formatDate( form.fe_actualizado )"
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
            tabla: 'tg_visitante',
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