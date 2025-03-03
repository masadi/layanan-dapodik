import Vue from 'vue'
import FeatherIcon from '@core/components/feather-icon/FeatherIcon.vue'
import VueTablerIcons from "vue-tabler-icons";
import { IconsPlugin } from 'bootstrap-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
Vue.use(IconsPlugin)
Vue.use(VueTablerIcons);
//Vue.component(FeatherIcon.name, FeatherIcon)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component(FeatherIcon.name, FeatherIcon)

import {
    faHeartCircleCheck,
    faPersonSkating,
    faPlus,
    faPrint,
    faUpload,
    faUserGraduate,
} from '@fortawesome/free-solid-svg-icons'
import { 
    faFilePdf,
    faFileExcel,
    faCalendarCheck,
} from '@fortawesome/free-regular-svg-icons'
library.add(
    faFilePdf,
    faFileExcel,
    faPlus,
    faPrint,
    faUpload,
    faCalendarCheck,
    faHeartCircleCheck,
    faPersonSkating,
    faUserGraduate,
)
