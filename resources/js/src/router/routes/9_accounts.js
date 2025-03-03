export default [
  {
    path: '/account/chart-of-account',
    name: 'chart-of-account-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'chart-of-account-read',
      action: 'read',
      pageTitle: 'Account List',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Account List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-chart-of-account',
          link: '',
          variant: 'success',
          text: 'Create Account',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-chart-of-account',
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
    path: '/account/transaction-type',
    name: 'transaction-type-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'transaction-type-read',
      action: 'read',
      pageTitle: 'Add Default Account',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Add Default Account',
          active: true,
        },
      ],
      tombol_add: [],
    },
  },
  {
    path: '/account/ledger',
    name: 'ledger-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'ledger-read',
      action: 'read',
      pageTitle: 'Ledger',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Ledger',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-ledger',
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
    path: '/account/customer-ledger',
    name: 'customer-ledger-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'customer-ledger-read',
      action: 'read',
      pageTitle: 'Customer Ledger',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Customer Ledger',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-customer-ledger',
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
    path: '/account/supplier-ledger',
    name: 'supplier-ledger-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'supplier-ledger-read',
      action: 'read',
      pageTitle: 'Supplier Ledger',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Supplier Ledger',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-supplier-ledger',
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
    path: '/account/general-journal',
    name: 'general-journal-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'general-journal-read',
      action: 'read',
      pageTitle: 'General Journal',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'General Journal',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-general-journal',
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
    path: '/account/journal-entry',
    name: 'journal-entry-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'journal-entry-read',
      action: 'read',
      pageTitle: 'Journal Entry',
    },
  },
  {
    path: '/account/opening-balance',
    name: 'opening-balance-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'opening-balance-read',
      action: 'read',
      pageTitle: 'Opening Balance In List',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Opening Balance In List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-opening-balance',
          link: '',
          variant: 'success',
          text: 'Create Balance In',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-opening-balance',
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
    path: '/account/trial-balance',
    name: 'trial-balance-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'trial-balance-read',
      action: 'read',
      pageTitle: 'Trial Balance',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Trial Balance',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-trial-balance',
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
    path: '/account/balance-sheet',
    name: 'balance-sheet-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'balance-sheet-read',
      action: 'read',
      pageTitle: 'Balance Sheet',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Balance Sheet',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-balance-sheet',
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
    path: '/account/profit-and-loss',
    name: 'profit-and-loss-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'profit-and-loss-read',
      action: 'read',
      pageTitle: 'Profit & Loss Statement',
      breadcrumb: [
        {
          text: 'Account',
        },
        {
          text: 'Profit & Loss Statement',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-profit-and-loss',
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
