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
            firstColor?.images?.[0]?.image_path || "placeholder.jpg";

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

        const firstImage = color.images?.[0]?.image_path || p.selectedImage;

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
            className="product-card block rounded-lg overflow-hidden relative cursor-pointer"
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

            {/* Image */}
            <div className="w-full h-100 flex justify-center">
              <img
                className="w-full h-100 object-cover"
                src={`http://localhost:8000/storage/${p.selectedImage}`}
                alt={p.name}
              />
            </div>

            {/* Sizes */}
            <div className="p-1 flex space-x-1">
              {p.sizes?.map((size) => (
                <button
                  key={size.id}
                  className="px-2 py-1 border rounded"
                  onClick={(e) => e.stopPropagation()}
                >
                  {size.name}
                </button>
              ))}
            </div>

            

            {/* Content */}
            <div className="pl-1">
              <h5 className=" text-xl font-semibold tracking-tight">
                {p.brand?.name}
              </h5>
              <h5 className=" text-xs  tracking-tight">
                {p.name}
              </h5>
              {/* <p className="mb-2 text-gray-700 text-sm">
                {p.description?.split(" ").slice(0, 10).join(" ")} ...
              </p> */}
              <p className=" text-xs  text-gray-900">{p.price} $</p>
            {/* Colors */}
            <div className="flex  space-x-1">
              {p.product_colors?.map((pc) => (
                <span
                  key={pc.id}
                  style={{
                    backgroundColor: pc.color.hex_code || "#000",
                    width: "15px",
                    height: "15px",
                    display: "inline-block",
                    borderRadius: "50%",
                    cursor: "pointer",
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
