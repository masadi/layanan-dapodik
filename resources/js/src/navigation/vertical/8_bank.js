export default [
  {
    icon: 'building-bank-icon',
    title: 'Bank',
    children: [
      {
        icon: 'hand-click-icon',
        title: 'Cash Bank',
        route: 'cash-bank-read',
        resource: 'cash-bank-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Bank Deposits',
        route: 'bank-deposits-read',
        resource: 'bank-deposits-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Bank Book',
        route: 'bank-book-read',
        resource: 'bank-book-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Cash/bank Out',
        route: 'cash-bank-out-read',
        resource: 'cash-bank-out-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Cash/bank In',
        route: 'cash-bank-in-read',
        resource: 'cash-bank-in-read',
        action: 'read',
      },
    ]
  },
]
  