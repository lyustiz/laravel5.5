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
                item-key="id_visita"
                :loading="isLoading"
                sort-by=""
            >

                <template slot="items" slot-scope="item">

                    <td class="text-xs-left">{{ item.item.id_visita }}</td>
					<td class="text-xs-left">{{ item.item.id_visitante }}</td>
					<td class="text-xs-left">{{ item.item.id_ced_empleado }}</td>
					<td class="text-xs-left">{{ item.item.id_empresa }}</td>
					<td class="text-xs-left">{{ item.item.id_tipo_visitante }}</td>
					<td class="text-xs-left">{{ item.item.tx_cargo }}</td>
					<td class="text-xs-left">{{ item.item.id_motivo }}</td>
					<td class="text-xs-left">{{ item.item.tx_observaciones }}</td>
					<td class="text-xs-left">{{ item.item.nu_carnet }}</td>
					<td class="text-xs-left">{{ item.item.fe_entrada }}</td>
					<td class="text-xs-left">{{ item.item.fe_salida }}</td>
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
                <tr-visita-form
                    :accion="accion"
                    :item="item"
                    :titulo="titulo"
                    @modalClose="modalClose()"
                ></tr-visita-form>

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
import TrVisitaForm  from 'TrVisitaForm';
export default {
    mixins:     [ listHelper],
    components: { 'tr-visita-form': TrVisitaForm },
    data () {
    return {
        titulo: 'TrVisita',
        headers: [
            
            { text: 'Visita',   value: 'id_visita' },
			{ text: 'Visitante',   value: 'id_visitante' },
			{ text: 'Ced Empleado',   value: 'id_ced_empleado' },
			{ text: 'Empresa',   value: 'id_empresa' },
			{ text: 'Tipo Visitante',   value: 'id_tipo_visitante' },
			{ text: 'Cargo',   value: 'tx_cargo' },
			{ text: 'Motivo',   value: 'id_motivo' },
			{ text: 'Observaciones',   value: 'tx_observaciones' },
			{ text: 'Carnet',   value: 'nu_carnet' },
			{ text: 'Entrada',   value: 'fe_entrada' },
			{ text: 'Salida',   value: 'fe_salida' },
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
        
           axios.get('api/trVisita')
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
            axios.delete('/api/v1/trVisita/'+this.item.id_visita)
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