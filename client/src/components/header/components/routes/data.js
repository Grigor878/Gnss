export const routes = [
  {
    id: "Home",
    path: "/",
    title: "Home",
  },
  {
    id: "About Us",
    path: "/about",
    title: "About Us",
  },
  {
    id: "Contact Us",
    path: "/contact",
    title: "Contact Us",
  },
  {
    id: "products",
    path: "/products",
    title: "Products",
    categories: [
      {
        title: "Medical solutions",
        path: "/medical_solutions",
        image: null,
        subcategories: [
          {
            title: "ENT",
            path: "/ent",
            image: null,
          },
          {
            title: "PLASTIC AND RECONSTRUCTIVE SURGERY",
            path: "/plastic_and_reconstructive_surgery",
            image: null,
          },
          {
            title: "OPHTHALMOLOGY",
            path: "/ophthalmology",
            image: null,
          },
          {
            title: "NEUROLOGY",
            path: "/neurology",
            image: null,
          },
          {
            title: "CARDIOLOGY",
            path: "/cardiology",
            image: null,
          },
          {
            title: "ONCOLOGY",
            path: "/oncology",
            image: null,
          },
          {
            title: "UROLOGY AND GYNECOLOGY",
            path: "/urology_and_gynecology",
            image: null,
          },
          {
            title: "DENTAL",
            path: "/dental",
            image: null,
          },
        ],
      },
      {
        title: "Laboratory solutions",
        path: "/laboratory_solutions",
        image: null,
        subcategories: [
          {
            title: "HISTOLOGY EQUIPMENT",
            path: "/histology_equipment",
            image: null,
          },
          {
            title: "DIGITAL PATHOLOGY",
            path: "/digital_pathology",
            image: null,
          },
          {
            title: "CLINIC MICROSCOPE",
            path: "/clinic_microscope",
            image: null,
          },
          {
            title: "HISTOLOGY CONSUMABLES",
            path: "/histology_consumables",
            image: null,
          },
          {
            title: "IHC, ISH, FISH",
            path: "/ihc_ish_fish",
            image: null,
          },
        ],
      },
      {
        title: "Geometrical solutions",
        path: "/geometrical_solutions",
        image: null,
        subcategories: [],
      },
      {
        title: "Photo solutions",
        path: "/photo_solutions",
        image: "categories/34480688686_category_4_image.jpg",
        subcategories: [],
      },
    ],
  },
];
