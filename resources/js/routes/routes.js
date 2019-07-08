import DashboardLayout from '@/pages/Layout/DashboardLayout.vue'

import Dashboard from '@/pages/Dashboard.vue'
import UserProfile from '@/pages/UserProfile.vue'
import AddProduct from '@/pages/AddProduct.vue'
import AddInvoice from '@/pages/AddInvoice.vue'
import EditInvoice from '@/pages/EditInvoice.vue'
import ReceiveInvoice from '@/pages/ReceiveInvoice.vue'
import AddOrderBooker from '@/pages/AddOrderBooker.vue'
import AddSaleMan from '@/pages/AddSaleMan.vue'
import OrderBookerList from '@/pages/OrderBookerList.vue'
import SaleManList from '@/pages/SaleManList.vue'
import ProductList from '@/pages/ProductList.vue'
import CompanyList from '@/pages/CompanyList.vue'
import SalesReport from '@/pages/SalesReport.vue'
import ExpenseReport from '@/pages/ExpenseReport.vue'

const routes = [
  {
    path: '/',
    component: DashboardLayout,
    redirect: '/dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'Dashboard',
        component: Dashboard
      },
      {
        path: 'add_product',
        name: 'Add Products',
        component: AddProduct
      },
      {
        path: 'create_invoice',
        name: 'Create Invoice',
        component: AddInvoice
      },,
      {
        path: 'edit_invoice/:id',
        name: 'EditInvoice',
        component: EditInvoice,
        props: true
      },
      {
        path: 'receive_invoice',
        name: 'Receive Invoice',
        component: ReceiveInvoice
      },
      {
        path: 'add_order_booker',
        name: 'Add OrderBooker',
        component: AddOrderBooker
      },
      {
        path: 'add_sale_man',
        name: 'Add SaleMan',
        component: AddSaleMan
      },
      {
        path: 'order_booker_list',
        name: 'OrderBooker List',
        component: OrderBookerList
      },
      {
        path: 'sale_man_list',
        name: 'SaleMan List',
        component: SaleManList
      },
      {
        path: 'product_list',
        name: 'Product List',
        component: ProductList
      },
      {
        path: 'company_list',
        name: 'Companies List',
        component: CompanyList
      },
      {
        path: 'sales_report',
        name: 'Sales Report',
        component: SalesReport
      },
      {
        path: 'expense_report',
        name: 'Expenses Report',
        component: ExpenseReport
      }
      ]
  }
]

export default routes
