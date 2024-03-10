import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App'
import {RouterProvider , createBrowserRouter,} from 'react-router-dom'
import Login from './pages/Login'
import Signup from './pages/Signup'
import Homepage from './pages/Homepage'
import Services from './pages/Services'
import About from './pages/About'

const router = createBrowserRouter([
  {path:"/", element:<Homepage/>},
  {path:"/login", element:<Login/>},
  {path:"/signup", element:<Signup/>},
  {path:"/about", element:<About/>},
  {path:"/services", element:<Services/>}
])

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
)
