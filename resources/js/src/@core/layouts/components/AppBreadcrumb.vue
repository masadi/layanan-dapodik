<template>
  <b-row v-if="$route.meta.pageTitle" class="content-header">

    <!-- Content Left -->
    <template v-if="$route.meta.breadcrumb">
      <b-col class="content-header-left mb-2" cols="12" md="6">
        <b-row class="breadcrumbs-top">
          <b-col cols="12">
            <!--h2 class="float-left pr-1 mb-0" v-bind:class="{'content-header-title': $route.meta.breadcrumb }">
              {{ t($route.meta.pageTitle) }}
            </h2-->
            <div class="breadcrumb-wrapper">
              <b-breadcrumb>
                <b-breadcrumb-item to="/">
                  <feather-icon icon="HomeIcon" size="16" class="align-text-top" />
                </b-breadcrumb-item>
                <b-breadcrumb-item v-for="item in $route.meta.breadcrumb" :key="item.text" :active="item.active" :to="item.to">
                  {{ t(item.text) }}
                </b-breadcrumb-item>
              </b-breadcrumb>
            </div>
          </b-col>
        </b-row>
      </b-col>
      <template v-if="$route.meta.tombol_add.length && !hide_button">
        <b-col class="content-header-right text-md-right d-md-block d-none mb-1" cols="12" md="6">
          <template v-for="(tombol, index) in $route.meta.tombol_add">
            <template v-if="adaRole(tombol.role)">
              <template v-if="tombol.action">
                <b-button v-ripple.400="'rgba(255, 255, 255, 0.15)'" :variant="tombol.variant" @click="action(tombol.action)" :disabled="loading" :class="classMr(index, $route.meta.tombol_add.length)" size="sm">
                  <b-spinner small type="grow" v-show="loading"></b-spinner>
                  <font-awesome-icon :icon="tombol.icon" /> {{tombol.text}}
                </b-button>
              </template>
              <template v-else>
                <b-button v-ripple.400="'rgba(255, 255, 255, 0.15)'" :variant="tombol.variant" :href="tombol.link" target="_blank" :class="classMr(index, $route.meta.tombol_add.length)" size="sm">
                  <font-awesome-icon :icon="tombol.icon" /> {{tombol.text}}
                </b-button>
              </template>
            </template>
          </template>
        </b-col>
      </template>
    </template>
  </b-row>
</template>

<script>
import { BBreadcrumb, BBreadcrumbItem, BRow, BCol, BDropdown, BDropdownItem, BButton, BSpinner } from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import { useUtils as useI18nUtils } from '@core/libs/i18n'
import eventBus from '@core/utils/eventBus';
export default {
  directives: {
    Ripple,
  },
  components: {
    BBreadcrumb,
    BBreadcrumbItem,
    BRow,
    BCol,
    BDropdown,
    BDropdownItem,
    BButton,
    BSpinner,
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
      hide_button: false,
      loading: false,
    }
  },
  created() {
    eventBus.$on('hide-button', this.handleEvent);
    eventBus.$on('loading', (val) => {
      this.loading = val
    })
  },
  methods: {
    classMr(index, length){
      if(index != (length - 1)){
        return 'mr-1'
      }
      return ''
    },
    adaRole(roles){
      if(roles){
        return this.hasRole(roles)
      } else {
        return true
      }
    },
    handleEvent(){
      console.log('hide-button');
      this.hide_button = true
    },
    action(val){
      eventBus.$emit(val);
      console.log('posisi: src/@core/layouts/components/AppBreadcrumb.vue => '+val);
    },
  }
}
</script>