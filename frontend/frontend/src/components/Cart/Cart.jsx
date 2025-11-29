import React, { useEffect, useState } from "react";
import axios from "axios";

export const Cart = () => {
  const [products, setProducts] = useState([]);
  const [cart, setCart] = useState([]);

  // Fetch products (assume you have /api/products endpoint)
  const fetchProducts = async () => {
    try {
      const res = await axios.get("http://127.0.0.1:8000/api/data");
      setProducts(res.data);
    } catch (err) {
      console.error(err);
    }
  };

  // Fetch user's cart
  const fetchCart = async () => {
    try {
      const res = await axios.get("http://127.0.0.1:8000/api/cart", {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });
      setCart(res.data.data);
    } catch (err) {
      console.error(err);
    }
  };

  // Add product to cart
  const addToCart = async (productId) => {
    try {
      const res = await axios.post(
        "/api/cart",
        { product_id: productId, quantity: 1 },
        {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        }
      );
      console.log(res.data.message);
      fetchCart(); // refresh cart
    } catch (err) {
      console.error(err);
    }
  };

  useEffect(() => {
    fetchProducts();
    fetchCart();
  }, []);

  return (
    <div className="flex gap-8 p-4">
      
      {/* Cart */}
      <div className="w-1/3 border p-4 rounded shadow">
        <h2 className="text-xl font-bold mb-4">Cart</h2>
        {cart.length === 0 && <p>Your cart is empty</p>}
        <ul>
          {cart.map((item) => (
            <li key={item.id} className="mb-2">
              <div className="flex justify-between items-center">
                <span>
                  {item.product.name} x {item.quantity}
                </span>
                <span>${item.product.price * item.quantity}</span>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default Cart;
