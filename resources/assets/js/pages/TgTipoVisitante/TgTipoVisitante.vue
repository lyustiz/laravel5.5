<template>

    <list-container :titulo="titulo" :head-color="$App.theme.headList">

        <template slot="HeadTools">
            <add-button @insItem="insItem()"></add-button>
        </template>

            <v-flex xs12 xs6>
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Buscar"
                    hide-details
                    clearable
                ></v-text-field>
            </v-flex>

            <v-data-table
                :headers="headers"
                :items  ="items"
                :search ="search"
                v-model ="selected"
                item-key="id_tipo_visitante"
                :loading="isLoading"
                sort-by=""
            >

                <template slot="items" slot-scope="item">

                    <td class="text-xs-left">{{ item.item.id_tipo_visitante }}</td>
					<td class="text-xs-left">{{ item.item.nb_tipo_visitante }}</td>
					<td class="text-xs-left">{{ item.item.id_status }}</td>
					<td class="text-xs-left">{{ item.item.fe_creado }}</td>
					<td class="text-xs-left">{{ item.item.fe_actualizado }}</td>
					<td class="text-xs-left">{{ item.item.id_usuario }}</td>
                    
                
                    <td class="text-xs-center">
                        <list-buttons @editar="updItem(item.item)" @eliminar="delForm(item.item)" ></list-buttons>
                    </td>

                </template>

            </v-data-table>

            <app-modal
                :nb-action="nbAction"
                :modal="modal"
                @modalClose="modalClose()"
                :head-color="$App.theme.headModal"
            >
                <tg-tipo-visitante-form
                    :accion="accion"
                    :item="item"
                    :titulo="titulo"
                    @modalClose="modalClose()"
                ></tg-tipo-visitante-form>

            </app-modal>

            <app-dialogo
                :dialog="dialog"
                mensaje="Desea eliminar el Item Seleccionado?"
                @delItem="delItem()"
                @delCancel="delCancel()"
            ></app-dialogo>

            <app-mensaje></app-mensaje>

            <pre v-if="$App.debug">{{ $data }}</pre>

    </list-container>

</template>

<script>
import listHelper from '~/mixins/Applist';
import TgTipoVisitanteForm  from 'TgTipoVisitanteForm';
export default {
    mixins:     [ listHelper],
    components: { 'tg-tipo-visitante-form': TgTipoVisitanteForm },
    data () {
    return {
        titulo: 'TgTipoVisitante',
        headers: [
            
            { text: 'Tipo Visitante',   value: 'id_tipo_visitante' },
			{ text: 'Tipo Visitante',   value: 'nb_tipo_visitante' },
			{ text: 'Status',   value: 'id_status' },
			{ text: 'Creado',   value: 'fe_creado' },
			{ text: 'Actualizado',   value: 'fe_actualizado' },
			{ text: 'Usuario',   value: 'id_usuario' },

            { text: 'Acciones', value: 'id_status'  },
        ],
    }
    },
    methods:
    {
        list () {

            this.isLoading = false
        
           axios.get('api/tgTipoVisitante')
            .then(respuesta => {
                this.items = respuesta.data;
                this.isLoading = false
            })
            .catch(error => {
                this.showError(error)
                this.isLoading = false
            })
        },
        delItem(){
            axios.delete('/api/v1/tgTipoVisitante/'+this.item.id_tipo_visitante)
            .then(respuesta => {
                this.verMsj(respuesta.data.msj)
                this.list();
                this.item = '';
                this.dialogo = false;
            })
            .catch(error => {
                this.showError(error)
            })
        }
    }
}
</script>

<style>
</style>