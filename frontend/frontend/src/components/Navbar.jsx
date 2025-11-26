import React from "react";
import { Outlet } from "react-router-dom";

export default function Navbar() {
  return (
   <div>
     <nav className="navbar flex w-full items-center px-20 py-5 justify-between shadow-md bg-gray-100">
      <div className="navbar-start max-md:w-1/4">
        <a className="text-2xl font-bold tracking-wide no-underline" href="#" style={{ color: "#ff6a00" }}>
          FlyonUI
        </a>
      </div>

      <div className="navbar-center max-md:hidden">
        <ul className="menu menu-horizontal flex justify-between px-40 font-medium">
          <li><a href="#" className="nav-link mx-3 active">Shop</a></li>
          <li><a href="#" className="nav-link mx-3">Collections</a></li>
          <li><a href="#" className="nav-link mx-3">Explore</a></li>
        </ul>
      </div>

      <div className="navbar-end items-center gap-4">
        <div className="dropdown relative inline-flex md:hidden">
          <button
            id="dropdown-default"
            type="button"
            className="dropdown-toggle btn btn-text btn-secondary btn-square"
            aria-haspopup="menu"
            aria-expanded="false"
            aria-label="Dropdown"
          >
            <span className="icon-[tabler--menu-2] dropdown-open:hidden size-5"></span>
            <span className="icon-[tabler--x] dropdown-open:block hidden size-5"></span>
          </button>
          <ul
            className="dropdown-menu dropdown-open:opacity-100 hidden min-w-60"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="dropdown-default"
          >
            <li><a className="dropdown-item" href="#">Shop</a></li>
            <li><a className="dropdown-item" href="#">Collections</a></li>
            <li><a className="dropdown-item" href="#">Explore</a></li>
          </ul>
        </div>

        <a className="btn max-md:btn-square px-5 py-2 rounded-md" href="#">
          <span className="max-md:hidden px-2">
            <i className="fa-solid text-[#ff6a00] fa-cart-arrow-down"></i> Cart
          </span>
          <span className="max-md:hidden px-2">
            <i className="fa-regular fa-user text-[#ff6a00]"></i> My account
          </span>
        </a>
      </div>
    </nav>
    <Outlet />
   </div>
  );
}
