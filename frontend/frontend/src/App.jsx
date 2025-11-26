import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { StoreProducts } from './components/StoreProducts'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Navbar from './components/Navbar'

function App() {
  

  return (
   <>
   <BrowserRouter>
    <Routes >
      <Route path='/' element={<Navbar />} >
        <Route index element={<StoreProducts />} />
      </Route>
    </Routes>
   </BrowserRouter>
   
   </>
  )
}

export default App
