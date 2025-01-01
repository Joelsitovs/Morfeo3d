import * as THREE from "three";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
import { RGBELoader } from "three/examples/jsm/loaders/RGBELoader.js";
const container = document.getElementById("threejs-container");

const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);


const scene = new THREE.Scene();


const camera = new THREE.PerspectiveCamera(
    50, // Campo de visión en grados
    container.clientWidth / container.clientHeight, // Relación de aspecto
    1, // Planos cercanos
    1000 // Planos lejanos
);
    //perspectiva de la camara
    console.log(camera.position);


// Establecer la posición inicial de la cámara
camera.position.set(0, -20, 60);

renderer.setClearColor(0xa3a3a3);

// Crear los controles de la cámara
const orbit = new OrbitControls(camera, renderer.domElement);
// Establecer el objetivo de los controles en la posición inicial de la cámara
orbit.target.set(0, 0, 0); // Configura el objetivo de la cámara en el origen (0, 0, 0)
orbit.update();

const gltfLoader = new GLTFLoader();
const rgbeLoader = new RGBELoader();

renderer.outputEncoding = THREE.sRGBEncoding;
renderer.toneMapping = THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure = 4;

let grid; // Declarar la cuadrícula aquí
let myModel;

rgbeLoader.load(
    "./storage/uploads/MR_INT-005_WhiteNeons_NAD.hdr",
    function (texture) {
        texture.mapping = THREE.EquirectangularReflectionMapping;
        scene.environment = texture;

        gltfLoader.load("./storage/uploads/3d.gltf", function (gltf) {
            const model = gltf.scene;

            // Rotar el modelo si es necesario
            model.rotation.x = -Math.PI / 2; // Rotar 90 grados hacia abajo
            model.rotation.y = 0;
            model.rotation.z = Math.PI;

            // Calcular la bounding box del modelo
            const box = new THREE.Box3().setFromObject(model);
            const size = new THREE.Vector3();
            box.getSize(size);

            // Centrar el modelo en el origen (0, 0, 0)
            const center = new THREE.Vector3();
            box.getCenter(center);

            // Ajustar la posición del modelo para centrarlo en el origen de la escena (0, 0, 0)
            model.position.x = -center.x; // Ajustar posición X al centro
            model.position.y = -center.y; // Ajustar posición Y al centro
            model.position.z = -center.z; // Ajustar posición Z al centro

            // Ajustar el tamaño del modelo para que se ajuste al tamaño del grid
            const maxDimension = Math.max(size.x, size.y, size.z); // Dimensión más grande del modelo
            const gridSize = 30; // Tamaño de la cuadrícula
            const scaleFactor = gridSize / maxDimension; // Calcular el factor de escala basado en la cuadrícula

            model.scale.set(scaleFactor, scaleFactor, scaleFactor); // Escalar el modelo

            // Ajustar el tamaño de la cuadrícula según el tamaño del modelo
            if (!grid) {
                grid = new THREE.GridHelper(gridSize, 30); // Crear la cuadrícula solo una vez
                scene.add(grid);
            }

            // Ajustar la posición de la cuadrícula para que esté centrada en el modelo
            grid.position.set(0, -center.y, 0); // Mover la cuadrícula al centro del modelo

            scene.add(model);
            myModel = model;
        });
    }
);

// Función para alternar la visibilidad del grid al presionar 'F'
function toggleGridVisibility(event) {
    if (event.key === "f" || event.key === "F") {
        if (grid) {
            grid.visible = !grid.visible; // Cambiar la visibilidad del grid
        }
    }
}

window.addEventListener("keydown", toggleGridVisibility); // Escuchar la tecla 'F'

function animate(time) {
  
    console.log(camera.position);

    renderer.render(scene, camera);
}

renderer.setAnimationLoop(animate);

// Ajustar tamaño al cambiar el tamaño de la ventana
window.addEventListener("resize", function () {
    renderer.setSize(container.clientWidth, container.clientHeight);
    camera.aspect = container.clientWidth / container.clientHeight;
    camera.updateProjectionMatrix();
});

