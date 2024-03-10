import React from 'react'
import {Link,NavLink} from 'react-router-dom'
function Homepage() {
  return (
    <>
   <div className='text-center'>
    <button className='bg-pink-200 rounded-lg p-2'><Link to="/login" >Login</Link></button>
    <button className='bg-pink-200 rounded-lg p-2'><Link to="/signup" >SignUp</Link></button>
    <button className='bg-pink-200 rounded-lg p-2'><Link to="/about" >About</Link></button>
    <button className='bg-pink-200 rounded-lg p-2'><Link to="/services" >Services</Link></button>
    <button className='bg-pink-200 rounded-lg p-2'><NavLink to="/" className={({isActive})=>`${isActive ? "text-blue underline":"text-black"}`}>Home</NavLink></button>
   </div>
    </>
  )
}

export default Homepage