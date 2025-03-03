export default [
  {
    icon: 'scan-icon',
    title: 'Inventory',
    children: [
      {
        icon: 'hand-click-icon',
        title: 'Warehouse Stock',
        route: 'warehouse-stock-read',
        resource: 'warehouse-stock-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Product Expired',
        route: 'product-expired-read',
        resource: 'product-expired-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Stock Reminder',
        route: 'stock-reminder-read',
        resource: 'stock-reminder-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Stock Take',
        route: 'stock-take-read',
        resource: 'stock-take-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Stock Adjustment',
        route: 'stock-adjustment-read',
        resource: 'stock-adjustment-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Stock Report',
        route: 'stock-report-read',
        resource: 'stock-report-read',
        action: 'read',
      },
    ]
  },
]
  