<template>
  <b-card>
    <datatable :isBusy="isBusy" :loading="loading" :actions="actions" :items="items" :fields="fields" :meta="meta" @per_page="handlePerPage" @pagination="handlePagination" @search="handleSearch" @sort="handleSort" @aksi="handleAksi" />
    <ModalMutasiMasuk @reload="handleReload" :data="data"></ModalMutasiMasuk>
  </b-card>
</template>

<script>
import { BCard } from 'bootstrap-vue'
import Datatable from '@/views/components/Datatables.vue'
import ModalMutasiMasuk from '@/views/components/modal/ModalMutasiMasuk.vue';
import eventBus from '@core/utils/eventBus';
export default {
  components: {
    BCard,
    Datatable,
    ModalMutasiMasuk,
  },
  data() {
    return {
      isBusy: true,
      loading: false,
      actions: [
        {action: 'edit', icon: 'pencil-icon', text: 'Edit'},
        {action: 'delete', icon: 'trash-icon', text: 'Batalkan'}
      ],
      fields: [
        {
          key: 'nama',
          label: 'Nama',
          sortable: true,
          thClass: 'text-center',
        },
        {
          key: 'nik',
          label: 'NIK',
          sortable: true,
          thClass: 'text-center',
        },
        {
          key: 'nisn',
          label: 'NISN',
          sortable: true,
          thClass: 'text-center',
        },
        {
          key: 'asal_sekolah',
          label: 'Asal Sekolah',
          sortable: true,
          thClass: 'text-center',
        },
        {
          key: 'status',
          label: 'Status',
          sortable: true,
          thClass: 'text-center',
          tdClass: 'text-center'
        },
        {
          key: 'actions',
          label: 'Aksi',
          sortable: false,
          thClass: 'text-center',
          tdClass: 'text-center'
        },
      ],
      items: [],
      meta: {},
      current_page: 1, 
      per_page: 25, 
      search: '',
      sortBy: 'id', 
      sortByDesc: true,
      data: 'mutasi-masuk',
    }
  },
  created() {
    eventBus.$on('add-mutasi-masuk', this.handleImportEvent);
    this.loadPostsData()
  },
  methods: {
    handleImportEvent(){
      eventBus.$emit('open-modal-mutasi-masuk')
    },
    loadPostsData() {
      this.isBusy = true
      let current_page = this.search == '' ? this.current_page : this.current_page != 1 ? 1 : this.current_page
      //let current_page = this.current_page//this.search == '' ? this.current_page : 1
      this.$http.get('/datatables', {
        params: {
          data: this.data,
          page: current_page,
          per_page: this.per_page,
          q: this.search,
          sortby: this.sortBy,
          sortbydesc: this.sortByDesc ? 'DESC' : 'ASC'
        }
      }).then(response => {
        let getData = response.data.data
        this.isBusy = false
        this.items = getData.data
        this.meta = {
          total: getData.total,
          current_page: getData.current_page,
          per_page: getData.per_page,
          from: getData.from,
          to: getData.to,
        }
      })
    },
    handlePerPage(val) {
      this.per_page = val
      this.loadPostsData()
    },
    handlePagination(val) {
      this.current_page = val
      this.loadPostsData()
    },
    handleSearch(val) {
      this.search = val
      this.loadPostsData()
    },
    handleSort(val) {
      if (val.sortBy) {
        this.sortBy = val.sortBy
        this.sortByDesc = val.sortDesc
        this.loadPostsData()
      }
    },
    handleAksi(val){
      if(val.aksi == 'delete'){
        this.$swal({
          title: 'Are you sure?',
          text: 'This action has not been cancelled!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes!',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ml-1',
          },
          buttonsStyling: false,
          allowOutsideClick: () => false,
        }).then(result => {
          if (result.value) {
            this.loading_modal = true
            this.$http.delete(`/delete-data/${this.data}/${val.item.id}`).then(response => {
              let getData = response.data
              this.$swal({
                icon: getData.icon,
                title: getData.title,
                text: getData.text,
                customClass: {
                  confirmButton: 'btn btn-success',
                },
                allowOutsideClick: false,
              }).then(result => {
                this.loadPostsData()
              })
            });
          }
        })
      }
      if(val.aksi == 'edit'){
        eventBus.$emit(`add-${this.data}`, val.item)
      }
    },
    handleReload(){
      this.loadPostsData()
    },
  },
}
</script>