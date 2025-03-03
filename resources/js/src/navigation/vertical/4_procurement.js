export default [
  {
    icon: 'briefcase-icon',
    title: 'Procurement',
    children: [
      {
        icon: 'hand-click-icon',
        title: 'Purchase Request',
        route: 'purchase-request-read',
        resource: 'purchase-request-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Purchase Order',
        route: 'purchase-order-read',
        resource: 'purchase-order-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Goods Receipt',
        route: 'goods-receipt-read',
        resource: 'goods-receipt-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Account Payable (AP)',
        route: 'account-payable-read',
        resource: 'account-payable-read',
        action: 'read',
      },
    ]
  },
]
  