export default [
  {
    path: '/post/discount',
    name: 'discounts-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'discounts-read',
      action: 'read',
      pageTitle: 'Discount List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Discount List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-discounts',
          link: '',
          variant: 'success',
          text: 'Add New Discounts',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-discounts',
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
    path: '/post/point-of-sales',
    name: 'pos-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'pos-read',
      action: 'read',
      pageTitle: 'Point of Sales',
    },
  },
  {
    path: '/post/discount',
    name: 'sales-order-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'sales-order-read',
      action: 'read',
      pageTitle: 'Sales Order List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Sales Order List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-sales-order',
          link: '',
          variant: 'success',
          text: 'Add Sales Order',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-sales-order',
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
    path: '/post/invoice',
    name: 'invoice-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'invoice-read',
      action: 'read',
      pageTitle: 'Invoice List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Invoice List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-invoice',
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
    path: '/post/account-receivable',
    name: 'account-receivable-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'account-receivable-read',
      action: 'read',
      pageTitle: 'Customer Payment List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Customer Payment List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-account-receivable',
          link: '',
          variant: 'success',
          text: 'Add New Payment',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-account-receivable',
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
    path: '/post/return-invoice',
    name: 'return-invoice-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'return-invoice-read',
      action: 'read',
      pageTitle: 'Return Invoice List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Return Invoice List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-return-invoice',
          link: '',
          variant: 'success',
          text: 'Add Return',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-return-invoice',
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
    path: '/post/sales-report',
    name: 'sales-report-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'sales-report-read',
      action: 'read',
      pageTitle: 'Sales Report List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Sales Report List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: '',
          link: '/sales-report/export',
          variant: 'success',
          text: 'Excel',
          icon: ['far', 'file-excel'],
          //role: ['administrator'],
        },
        {
          action: 'print-sales-report',
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
    path: '/post/return-report',
    name: 'return-report-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'return-report-read',
      action: 'read',
      pageTitle: 'Sales Return Report',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Sales Return Report',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-return-report',
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
    path: '/post/cashier-report',
    name: 'cashier-report-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'cashier-report-read',
      action: 'read',
      pageTitle: 'Cashier Report List',
      breadcrumb: [
        {
          text: 'POS',
        },
        {
          text: 'Cashier Report List',
          active: true,
        },
      ],
      tombol_add: [],
    },
  },
]
