<template>
  <div>
    <b-row>
      <template v-if="meta.filter">
        <template v-if="meta.filter.wilayah">
          <b-col md="3" class="mb-2">
            <v-select id="kabupaten_id" v-model="meta.kabupaten_id" :reduce="nama => nama.kode_wilayah" label="nama"
              :options="data_kabupaten" :placeholder="t('== Filter Municipio ==')" @input="changeKabupaten">
              <template #no-options="{ search, searching, loading }">
                Tidak ada data untuk ditampilkan
              </template>
            </v-select>
          </b-col>
          <b-col md="3" class="mb-2">
            <b-overlay :show="loading_kecamatan" opacity="0.6" size="md" spinner-variant="secondary">
              <v-select id="kecamatan_id" v-model="meta.kecamatan_id" :reduce="nama => nama.kode_wilayah" label="nama"
                :options="data_kecamatan" :placeholder="t('== Filter Posto ==')" @input="changeKecamatan">
                <template #no-options="{ search, searching, loading }">
                  Tidak ada data untuk ditampilkan
                </template>
              </v-select>
            </b-overlay>
          </b-col>
          <b-col md="3" class="mb-2">
            <b-overlay :show="loading_kelurahan" opacity="0.6" size="md" spinner-variant="secondary">
              <v-select id="kelurahan_id" v-model="meta.kelurahan_id" :reduce="nama => nama.kode_wilayah" label="nama"
                :options="data_kelurahan" :placeholder="t('== Filter Suco ==')" @input="changeKelurahan">
                <template #no-options="{ search, searching, loading }">
                  Tidak ada data untuk ditampilkan
                </template>
              </v-select>
            </b-overlay>
          </b-col>
          <b-col md="3" class="mb-2">
            <b-overlay :show="loading_desa" opacity="0.6" size="md" spinner-variant="secondary">
              <v-select id="desa_id" v-model="meta.desa_id" :reduce="nama => nama.kode_wilayah" label="nama"
                :options="data_desa" :placeholder="t('== Filter Aldeia ==')" @input="changeDesa">
                <template #no-options="{ search, searching, loading }">
                  Tidak ada data untuk ditampilkan
                </template>
              </v-select>
            </b-overlay>
          </b-col>
        </template>
      </template>
      <b-col md="4" class="mb-2">
        <v-select v-model="meta.per_page" :options="[10, 25, 50, 100]" @input="loadPerPage" :clearable="false"
          :searchable="false"></v-select>
      </b-col>
      <template v-if="meta.filter && meta.filter.role">
        <b-col md="4" class="mb-2">
          <v-select v-model="meta.role_id" :reduce="display_name => display_name.name" label="display_name"
            :options="meta.roles" :placeholder="t('Select Role')" :searchable="false" @input="filterRole"></v-select>
        </b-col>
        <b-col md="4" class="mb-2">
          <b-form-input @input="search" placeholder="Search..."></b-form-input>
        </b-col>
      </template>
      <template v-else>
        <b-col md="4" class="mb-2" offset-md="4">
          <b-form-input @input="search" placeholder="Search..."></b-form-input>
        </b-col>
      </template>
    </b-row>
    <b-overlay :show="loading" rounded opacity="0.6" size="lg" spinner-variant="warning">
      <b-table responsive bordered striped :items="items" :fields="fields" :sort-by.sync="sortBy"
        :sort-desc.sync="sortDesc" show-empty :busy="isBusy">
        <template #empty="scope">
          <p class="text-center">Tidak ada data untuk ditampilkan</p>
        </template>
        <template #head(actions)="data">
          {{ t(data.label) }}
        </template>
        <template #head(kode_wilayah)="data">
          {{ t(data.label) }}
        </template>
        <template #head(nama)="data">
          {{ t(data.label) }}
        </template>
        <template #head(no_urut)="data">
          {{ t(data.label) }}
        </template>
        <template #head(created_by)="data">
          {{ t(data.label) }}
        </template>
        <template #head(updated_by)="data">
          {{ t(data.label) }}
        </template>
        <template #table-busy>
          <div class="text-center text-danger my-2">
            <b-spinner class="align-middle"></b-spinner>
            <strong>Loading...</strong>
          </div>
        </template>
        <template v-slot:cell(kelompok)="row">
          {{ (row.item.negara.luar_negeri == '1') ? 'LUAR NEGERI' : 'DALAM NEGERI' }}
        </template>
        <template v-slot:cell(division_id)="row">
          {{ (row.item.division) ? row.item.division.name : '' }}
        </template>
        <template v-slot:cell(unit_id)="row">
          {{ (row.item.unit) ? row.item.unit.name : '' }}
        </template>
        <template v-slot:cell(name_coa)="row">
          <template v-if="row.item.children.length">
            {{ row.item.name }}
            <ul class="pl-1">
              <li v-for="child in row.item.children" :key="child.id">{{ child.name }}</li>
            </ul>
          </template>
          <template v-else>
            {{ row.item.name }}
          </template>
        </template>
        <template v-slot:cell(program_id)="row">
          {{ (row.item.program) ? row.item.program.code : '' }}
        </template>
        <template v-slot:cell(sub_program_id)="row">
          {{ (row.item.sub_program) ? row.item.sub_program.code : '' }}
        </template>
        <template v-slot:cell(group_id)="row">
          <template v-if="parseInt(row.item.level) !== 4">
            {{ (row.item.group) ? row.item.group.code : '' }}
          </template>
        </template>
        <template v-slot:cell(sub_group_id)="row">
          <template v-if="parseInt(row.item.level) !== 4">
            {{ (row.item.sub_group) ? row.item.sub_group.code : '' }}
          </template>
        </template>
        <template v-slot:cell(code)="row">
          <template v-if="parseInt(row.item.level) !== 4">
            {{ row.item.code }}
          </template>
        </template>
        <template v-slot:cell(budgeting_id)="row">
          {{ (row.item.budgeting) ? row.item.budgeting.code : '' }}
        </template>
        <template v-slot:cell(coa_id)="row">
          {{ (row.item.coa) ? row.item.coa.code : '' }}
        </template>
        <template v-slot:cell(kabupaten)="row">
          <template v-if="parseInt(id_level_wilayah) === 2">
            {{ (row.item.parrent_recursive) ? row.item.parrent_recursive.nama : '-' }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 3">
            {{ (row.item.parrent_recursive) ? (row.item.parrent_recursive.parrent_recursive) ?
              row.item.parrent_recursive.parrent_recursive.nama : '-' : '-' }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 4">
            {{ 
              (row.item.parrent_recursive) ? 
                (row.item.parrent_recursive.parrent_recursive) ?
                  (row.item.parrent_recursive.parrent_recursive.parrent_recursive) ?
                    row.item.parrent_recursive.parrent_recursive.parrent_recursive.nama : 
                  '-' : 
                '-' : 
              '-' 
            }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 5">
            <template v-if="parseInt(row.item.parrent_recursive.id_level_wilayah) === 3">
              {{ row.item.parrent_recursive.parrent_recursive.parrent_recursive.nama }}
            </template>
            <template v-else>
              {{ 
                (row.item.parrent_recursive) ? 
                  (row.item.parrent_recursive.parrent_recursive) ?
                    (row.item.parrent_recursive.parrent_recursive.parrent_recursive) ?
                      (row.item.parrent_recursive.parrent_recursive.parrent_recursive.parrent_recursive) ?
                        row.item.parrent_recursive.parrent_recursive.parrent_recursive.parrent_recursive.nama :
                      '-' :
                    '-' : 
                  '-' : 
                '-' 
              }}
            </template>
          </template>
        </template>
        <template v-slot:cell(kecamatan)="row">
          <template v-if="parseInt(id_level_wilayah) === 3">
            {{ (row.item.parrent_recursive) ? row.item.parrent_recursive.nama : '-' }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 4">
            {{ 
              (row.item.parrent_recursive) ? 
                (row.item.parrent_recursive.parrent_recursive) ?
                  row.item.parrent_recursive.parrent_recursive.nama : 
                '1' : 
              '2' 
            }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 5">
            {{ 
              (row.item.parrent_recursive) ? 
                (row.item.parrent_recursive.parrent_recursive) ? 
                  (row.item.parrent_recursive.parrent_recursive.parrent_recursive) ? 
                    (parseInt(row.item.parrent_recursive.parrent_recursive.parrent_recursive.id_level_wilayah) === 2) ? 
                      row.item.parrent_recursive.parrent_recursive.parrent_recursive.nama : 
                    row.item.parrent_recursive.parrent_recursive.nama : 
                  '1' :
                '2' : 
              '3' 
            }}
          </template>
        </template>
        <template v-slot:cell(kelurahan)="row">
          <template v-if="parseInt(id_level_wilayah) === 4">
            {{ 
              (row.item.parrent_recursive) ? 
                row.item.parrent_recursive.nama : 
              '-' 
            }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 5">
            {{ 
              (row.item.parrent_recursive) ? 
                (row.item.parrent_recursive.parrent_recursive) ? 
                  (parseInt(row.item.parrent_recursive.parrent_recursive.id_level_wilayah) === 3) ? 
                    row.item.parrent_recursive.parrent_recursive.nama : 
                    row.item.parrent_recursive.nama : 
                '2' : 
              '3' 
            }}
          </template>
        </template>
        <template v-slot:cell(desa)="row">
          <template v-if="parseInt(id_level_wilayah) === 4">
            {{ 
              (row.item.parrent_recursive) ? 
                row.item.parrent_recursive.nama : 
              '-' 
            }}
          </template>
          <template v-if="parseInt(id_level_wilayah) === 5">
            {{ 
              (row.item.parrent_recursive) ? 
                (parseInt(row.item.parrent_recursive.id_level_wilayah) === 4) ? 
                  row.item.parrent_recursive.nama : 
                '-' : 
              '-' 
            }}
          </template>
        </template>
        <template v-slot:cell(roles)="row">
          {{ allRoles(row.item.roles) }}
        </template>
        <template v-slot:cell(jenis_kelamin)="row">
          {{ row.item.jenis_kelamin === 'L' ? t('Male') : t('Female') }}
        </template>
        <template v-slot:cell(actions)="row">
          <template v-if="Array.isArray(actions)">
            <b-dropdown id="dropdown-dropright" dropright :text="t('Action')" variant="primary" size="sm">
              <template v-for="item in actions">
                <b-dropdown-item href="javascript:void(0)" @click="aksi(row.item, item.action)"
                  v-if="$can(item.action.replace('edit', 'update'), `${$route.name}-${item.action.replace('edit', 'update')}`)">
                  <component :is="item.icon" /> {{ t(item.text) }}
                </b-dropdown-item>
              </template>
            </b-dropdown>
          </template>
          <template v-else>
            <b-button size="sm" :variant="actions.variant" @click="aksi(row.item, actions.action)"
              v-if="$can(actions.action.replace('edit', 'update'), `${$route.name}-${actions.action.replace('edit', 'update')}`)">
              <b-icon :icon="actions.icon"></b-icon> {{ t(actions.text) }}
            </b-button>
          </template>
        </template>
      </b-table>
    </b-overlay>
    <b-row class="mt-2">
      <b-col md="6">
        <p>{{ t('Showing') }} {{ numberWithCommas(meta.from) }} {{ t('to') }} {{ numberWithCommas(meta.to) }} {{ t('from') }} {{
          numberWithCommas(meta.total) }} {{ t('entries') }}</p>
      </b-col>
      <b-col md="6">
        <b-pagination v-model="meta.current_page" :total-rows="meta.total" :per-page="meta.per_page" align="right"
          @change="changePage" aria-controls="dw-datatable"></b-pagination>
      </b-col>
    </b-row>
  </div>
</template>

<script>
import _ from 'lodash'
import { BRow, BCol, BFormInput, BTable, BSpinner, BPagination, BButton, BOverlay, BDropdown, BDropdownItem, BIcon, BIconPencilSquare } from 'bootstrap-vue'
import vSelect from 'vue-select'
import { useUtils as useI18nUtils } from '@core/libs/i18n'
export default {
  components: {
    BRow,
    BCol,
    BFormInput,
    BTable,
    BSpinner,
    BPagination,
    BButton,
    BOverlay,
    BDropdown,
    BDropdownItem,
    BIcon,
    BIconPencilSquare,
    vSelect,
  },
  props: {
    actions: {
      required: true
    },
    items: {
      type: Array,
      required: true
    },
    fields: {
      type: Array,
      required: true
    },
    meta: {
      required: true
    },
    id_level_wilayah: {
      type: Number,
      default: () => 0,
    },
    isBusy: {
      type: Boolean,
      default: () => true,
    },
    loading: {
      type: Boolean,
      default: () => false,
    },
    data_kabupaten: {
      type: Array,
      default: () => [],
    },
  },
  setup() {
    const { t } = useI18nUtils()
    return {
      // i18n
      t,
    }
  },
  data() {
    return {
      sortBy: null,
      sortDesc: false,
      loading_kecamatan: false,
      loading_kelurahan: false,
      loading_desa: false,
      data_kecamatan: [],
      data_kelurahan: [],
      data_desa: [],
    }
  },
  watch: {
    sortBy(val) {
      this.$emit('sort', {
        sortBy: this.sortBy,
        sortDesc: this.sortDesc
      })
    },
    sortDesc(val) {
      this.$emit('sort', {
        sortBy: this.sortBy,
        sortDesc: this.sortDesc
      })
    }
  },
  methods: {
    loadPerPage(val) {
      this.$emit('per_page', this.meta.per_page)
    },
    changePage(val) {
      this.$emit('pagination', val)
    },
    search: _.debounce(function (e) {
      this.$emit('search', e)
    }, 500),
    aksi(val, aksi) {
      this.$emit('aksi', {
        aksi: aksi,
        item: val,
      })
    },
    allRoles(roles) {
      var names = roles.map((a) => a.display_name);
      return names.join(", ")
    },
    filterRole(val) {
      this.$emit('filter_role', val)
    },
    changeKabupaten(val) {
      this.meta.kecamatan_id = ''
      this.meta.kelurahan_id = ''
      this.meta.desa_id = ''
      this.$emit('wilayah', {
        'id': 'kabupaten_id',
        'value': val
      })
      if (val) {
        this.loading_kecamatan = true
        this.$http.post('/wilayah/select', {
          kabupaten: val,
        }).then(res => {
          this.loading_kecamatan = false
          this.data_kecamatan = res.data
        });
      }
    },
    changeKecamatan(val) {
      this.meta.kelurahan_id = ''
      this.meta.desa_id = ''
      this.$emit('wilayah', {
        'id': 'kecamatan_id',
        'value': val
      })
      if (val) {
        this.loading_kelurahan = true
        this.$http.post('/wilayah/select', {
          kecamatan: val,
        }).then(res => {
          this.loading_kelurahan = false
          this.data_kelurahan = res.data
        });
      }
    },
    changeKelurahan(val) {
      this.meta.desa_id = ''
      this.$emit('wilayah', {
        'id': 'kelurahan_id',
        'value': val
      })
      if (val) {
        this.loading_desa = true
        this.$http.post('/wilayah/select', {
          desa: val,
        }).then(res => {
          this.loading_desa = false
          this.data_desa = res.data
        });
      }
    },
    changeDesa(val) {
      this.$emit('wilayah', {
        'id': 'desa_id',
        'value': val
      })
    }
  },
}
</script>
<style lang="scss">
@import '~@resources/scss/vue/libs/vue-sweetalert.scss';
</style>