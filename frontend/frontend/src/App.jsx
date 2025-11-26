import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { Store } from './components/Store'
import { BrowserRouter, Route, Routes } from 'react-router-dom'

function App() {
  

  return (
   <>
   <BrowserRouter>
    <Routes >
      <Route path='/' element={<Store />} />
    </Routes>
   </BrowserRouter>
  
   
   </>
  )
}

export default App
