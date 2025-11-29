import { Link, Outlet, useNavigate } from "react-router-dom";
import { AuthPanel } from "./Login";
import {
  ShoppingCartIcon,
  UserIcon,
  ArrowRightOnRectangleIcon,
} from "@heroicons/react/24/outline";
import { useState } from "react";
import CartPopup from "./Cart/CartPopUp";


export default function Navbar() {
  const navigate = useNavigate();
  const isLogged = Boolean(localStorage.getItem("token"));
  const [showAuthPanel, setShowAuthPanel] = useState(false);
  const [showCart, setShowCart] = useState(false);

  const handleLogout = () => {
    localStorage.removeItem("token");
    localStorage.removeItem("user");
    navigate("/");
  };

  return (
    <div>
      <nav className="navbar flex w-full items-center px-20 py-5 justify-between shadow-md bg-gray-100">
        <div className="navbar-start max-md:w-1/4">
          <a className="text-2xl font-tight tracking-wide no-underline" href="#">
            STYLIGHT
          </a>
        </div>

        <div className="navbar-end flex items-center gap-6">
          {/* Open Cart Popup */}
          <button onClick={() => setShowCart(true)}>
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

      {/* Slide Panels */}
      <AuthPanel show={showAuthPanel} closePanel={() => setShowAuthPanel(false)} />
      <CartPopup show={showCart} closePanel={() => setShowCart(false)} />

      <Outlet />
    </div>
  );
}
