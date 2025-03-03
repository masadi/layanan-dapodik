export default [
  {
    path: '/supply-chain/shipping-list',
    name: 'shipping-list-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'shipping-list-read',
      pageTitle: 'Supply Chain',
      action: 'read',
      breadcrumb: [
        {
          text: 'Supply Chain',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-shipping-list',
          link: '',
          variant: 'success',
          text: 'Add New Shipping',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-shipping-list',
          link: '',
          variant: 'danger',
          text: 'Print',
          icon: ['fas', 'print'],
          //role: ['administrator'],
        },
      ],
    },
  },
  {
    path: '/supply-chain/vehicles',
    name: 'vehicles-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'vehicles-read',
      pageTitle: 'Vehicles',
      action: 'read',
      breadcrumb: [
        {
          text: 'Vehicles',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-vehicles',
          link: '',
          variant: 'success',
          text: 'Add New Vehicles',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-vehicles',
          link: '',
          variant: 'danger',
          text: 'Print',
          icon: ['fas', 'print'],
          //role: ['administrator'],
        },
      ],
    },
  },
  {
    path: '/supply-chain/drivers',
    name: 'drivers-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      pageTitle: 'Drivers',
      resource: 'drivers-read',
      action: 'read',
      breadcrumb: [
        {
          text: 'Drivers',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-drivers',
          link: '',
          variant: 'success',
          text: 'Add New Drivers',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-drivers',
          link: '',
          variant: 'danger',
          text: 'Print',
          icon: ['fas', 'print'],
          //role: ['administrator'],
        },
      ],
    },
  },
]
