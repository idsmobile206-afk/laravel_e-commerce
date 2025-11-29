import React, { useEffect, useState } from "react";
import axios from "axios";
import { HeartIcon, ShoppingCartIcon } from "@heroicons/react/24/outline";
import { useNavigate } from "react-router-dom";

export const StoreProducts = () => {
    const [products, setProducts] = useState([]);
    const navigate = useNavigate();

    useEffect(() => {
        const getData = async () => {
            try {
                const res = await axios.get("http://127.0.0.1:8000/api/data");

                const productsWithSelected = res.data.map((p) => {
                    const firstColor = p.product_colors?.[0];
                    const firstImage =
                        firstColor?.images?.[0]?.image_path ||
                        "placeholder.jpg";

                    return {
                        ...p,
                        selectedImage: firstImage, // current displayed image
                    };
                });

                setProducts(productsWithSelected);
            } catch (e) {
                console.log("Error fetching data:", e.message);
            }
        };

        getData();
    }, []);

    // ----------------------------------------------
    // 👉 Color click: change image to first of that color
    // ----------------------------------------------
    const handleColorClick = (productId, colorId) => {
        setProducts((prev) =>
            prev.map((p) => {
                if (p.id !== productId) return p;

                const color = p.product_colors.find((pc) => pc.id === colorId);
                if (!color) return p;

                const firstImage =
                    color.images?.[0]?.image_path || p.selectedImage;

                return {
                    ...p,
                    selectedImage: firstImage,
                };
            })
        );
    };

    return (
        <div className="bg-gray-300 min-h-screen">
  <div className="grid grid-cols-4 gap-6 px-20 py-10">
    {products.map((p) => (
      <div
        key={p.id}
        className="product-card block rounded-lg overflow-hidden pb-2 relative cursor-pointer h-[500px] flex flex-col"
        onClick={() => navigate(`/products/${p.id}`)}
      >
        {/* Icons */}
        <div className="absolute top-3 right-3 flex space-x-3 z-10">
          <button className="p-2 transition">
            <HeartIcon className="w-5 h-5 text-black" />
          </button>
          <button className="transition">
            <ShoppingCartIcon className="w-5 h-5 text-black " />
          </button>
        </div>

        {/* Image Container */}
        <div className="relative w-full h-[400px] overflow-hidden group flex-shrink-0">
          <img
            className="w-full h-full object-cover"
            src={`http://localhost:8000/storage/${p.selectedImage}`}
            alt={p.name}
          />

          {/* Sizes overlay */}
          <div
            className="absolute bottom-0 left-0 w-full bg-gray-400 bg-opacity-50 p-2 flex justify-center space-x-2
                        transform translate-y-full opacity-0
                        group-hover:translate-y-0 group-hover:opacity-100
                        transition-all duration-300"
          >
            {p.sizes?.map((size) => (
              <button
                key={size.id}
                className="px-2 py-1 border rounded text-white text-sm"
                onClick={(e) => e.stopPropagation()}
              >
                {size.name}
              </button>
            ))}
          </div>
        </div>

        {/* Content */}
        <div className="pl-1 mt-1 flex flex-col justify-between flex-grow">
          
            <h5 className="text-xl font-semibold tracking-">
              {p.brand?.name}
            </h5>
            <h5 className="text-xs">{p.name}</h5>
            <p className="text-xs  text-gray-900">{p.price} $</p>
            {/* Colors */}
            <div className="flex space-x-1 mt-1=">
              {p.product_colors?.map((pc) => (
                <span
                  key={pc.id}
                  style={{
                    backgroundColor: pc.color.hex_code || "#000",
                    width: "12px",
                    height: "12px",
                    display: "inline-block",
                    borderRadius: "50%",
                    cursor: "pointer",
                    outline: "1px solid gray",
                    outlineOffset: "1px",
                  }}
                  onClick={(e) => {
                    e.stopPropagation();
                    handleColorClick(p.id, pc.id);
                  }}
                  title={pc.color.name}
                ></span>
              ))}
            </div>
        </div>
      </div>
    ))}
  </div>
</div>

    );
};
