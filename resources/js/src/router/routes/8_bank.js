export default [
  {
    path: '/bank/cash',
    name: 'cash-bank-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'cash-bank-read',
      action: 'read',
      pageTitle: 'Writen Cheque',
      breadcrumb: [
        {
          text: 'Bank',
        },
        {
          text: 'Writen Cheque',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-cash-bank',
          link: '',
          variant: 'success',
          text: 'Add Writen Cheque',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-cash-bank',
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
    path: '/bank/deposits',
    name: 'bank-deposits-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'bank-deposits-read',
      action: 'read',
      pageTitle: 'Deposit List',
      breadcrumb: [
        {
          text: 'Bank',
        },
        {
          text: 'Deposit List',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-bank-deposits',
          link: '',
          variant: 'success',
          text: 'Create Deposit',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-bank-deposits',
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
    path: '/bank/book',
    name: 'bank-book-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'bank-book-read',
      action: 'read',
      pageTitle: 'Bank Book',
      breadcrumb: [
        {
          text: 'Bank',
        },
        {
          text: 'Bank Book',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'print-bank-book',
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
    path: '/bank/cash-bank-out',
    name: 'cash-bank-out-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'cash-bank-out-read',
      action: 'read',
      pageTitle: 'Cash/Bank Out',
      breadcrumb: [
        {
          text: 'Bank',
        },
        {
          text: 'Cash/Bank Out',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-cash-bank-out',
          link: '',
          variant: 'success',
          text: 'New Cash/Bank Out',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-cash-bank-out',
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
    path: '/bank/cash-bank-in',
    name: 'cash-bank-in-read',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'cash-bank-in-read',
      action: 'read',
      pageTitle: 'Cash/Bank In',
      breadcrumb: [
        {
          text: 'Bank',
        },
        {
          text: 'Cash/Bank In',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-cash-bank-in',
          link: '',
          variant: 'success',
          text: 'New Cash/Bank In',
          icon: ['fas', 'plus'],
          //role: ['administrator'],
        },
        {
          action: 'print-cash-bank-in',
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
