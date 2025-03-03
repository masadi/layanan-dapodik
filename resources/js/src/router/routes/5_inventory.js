export default [
  {
    path: '/inventory/warehouse-stock',
    name: 'warehouse-stock-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'warehouse-stock-read',
      action: 'read',
      pageTitle: 'Warehouse Stock List',
      breadcrumb: [
        {
          text: 'Inventory',
        },
        {
          text: 'Warehouse Stock List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-warehouse-stock',
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
    path: '/inventory/product-expired',
    name: 'product-expired-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'product-expired-read',
      action: 'read',
      pageTitle: 'Expired Product List',
      breadcrumb: [
        {
          text: 'Inventory',
        },
        {
          text: 'Expired Product List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-product-expired',
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
    path: '/inventory/stock-reminder',
    name: 'stock-reminder-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'stock-reminder-read',
      action: 'read',
      pageTitle: 'Stock Alert Report',
      breadcrumb: [
        {
          text: 'Inventory',
        },
        {
          text: 'Stock Alert Report',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-stock-reminder',
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
    path: '/inventory/stock-take',
    name: 'stock-take-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'stock-take-read',
      action: 'read',
      pageTitle: 'Stock Take List',
      breadcrumb: [
        {
          text: 'Inventory',
        },
        {
          text: 'Stock Take List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-stock-take',
          link: '',
          variant: 'success',
          text: 'Add New Stock Take',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-stock-take',
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
    path: '/inventory/stock-adjustment',
    name: 'stock-adjustment-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'stock-adjustment-read',
      action: 'read',
      pageTitle: 'Stock Adjustment List',
      breadcrumb: [
        {
          text: 'Inventory',
        },
        {
          text: 'Stock Adjustment List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-stock-adjustment',
          link: '',
          variant: 'success',
          text: 'Add New Adjustment',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-stock-adjustment',
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
    path: '/inventory/stock-report',
    name: 'stock-report-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'stock-report-read',
      action: 'read',
      pageTitle: 'Stock Report',
      breadcrumb: [
        {
          text: 'Inventory',
        },
        {
          text: 'Stock Report',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: '',
          link: '/stock-report/export',
          variant: 'primary',
          text: 'Excel',
          icon: ['far', 'file-excel'],
          //role: ['administrator'],
        },
        {
          action: 'print-stock-report',
          link: '',
          variant: 'danger',
          text: 'Print',
          icon: ['fas', 'print'],
          //role: ['administrator'],
        },
      ]
    },
  },
]
