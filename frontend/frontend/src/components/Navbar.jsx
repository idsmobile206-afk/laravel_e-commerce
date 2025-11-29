import { Outlet, useNavigate } from "react-router-dom";
import { AuthPanel } from "./Login";
import {
  ShoppingCartIcon,
  UserIcon,
  ArrowRightOnRectangleIcon,
  XMarkIcon,
} from "@heroicons/react/24/outline";
import { useState } from "react";

export default function Navbar() {
  const navigate = useNavigate();
  const isLogged = Boolean(localStorage.getItem("token"));
  const [showAuthPanel, setShowAuthPanel] = useState(false);

  const handleLogout = () => {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    navigate("/");
  };

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

        <div className="navbar-end flex items-center gap-6">
          <button>
            <ShoppingCartIcon className="h-7 w-7 text-[#ff6a00]" />
          </button>

          {!isLogged && (
            <button onClick={() => setShowAuthPanel(true)}>
              <UserIcon className="h-7 w-7 text-[#ff6a00]" />
            </button>
          )}

          {isLogged && (
            <button onClick={handleLogout}>
              <ArrowRightOnRectangleIcon className="h-7 w-7 text-red-500" />
            </button>
          )}
        </div>
      </nav>

      {/* Auth Panel Slide-in */}
      <AuthPanel show={showAuthPanel} closePanel={() => setShowAuthPanel(false)} />

      <Outlet />
    </div>
  );
}
